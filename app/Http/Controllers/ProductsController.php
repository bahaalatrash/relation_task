<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class ProductsController extends Controller
{
    public function store(StoreProductRequest $request)
    {

        $product  = Product::query()->create($request->validated());

        return Response()->json([
            "message" => "product created successfully",
            "product" => $product
        ]);
    }
    public function showDetails(int $id)
    {
        $product = Product::query()->where('id', $id)->with('category')->first();

        return response()->json([
            "message" => "product with category",
            "data" => [
                "product"=>$product,
                "category name "=>$product->category->name
            ]
        ]);
    }
}
