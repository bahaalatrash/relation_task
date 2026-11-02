<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function store(StoreCategoryRequest $request)
    {

        $category = Category::query()->create($request->validated());

        return response()->json([
            "message" => "created succefully",
            "category" => $category
        ]);
    }

    public function show(int $id)
    {

        $categories = Category::query()->where('id', $id)->with('products')->get();
        return response()->json([
            "message" => "categories with products",
            "categories with related products" => $categories
        ]);
    }


    public function destroy(int $id)
    {
        $category = Category::query()->find($id);
        $products = $category->products;
        if ($products->isnotempty()) {
            return response()->json([
                "message" => "sorry we cant delete a category related to products"
            ]);
        } else {
            Category::query()->where('id', $id)->delete();
            return response()->json([
                "message" => "category deleted succesfully"
            ]);
        }
    }
}
