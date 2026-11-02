<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{


    public function index()
    {
        $student = Student::query()->with('medicalFile')->get();

        return response()->json([
            "the students with thier files" => $student,
        ]);
    }
    public function store(StoreStudentRequest $request)
    {

        $student = Student::query()->create($request->validated());

        return response()->json([
            "message" => "student created successfully",
            "student" => $student

        ]);
    }
    public function show(int $id)
    {
        $student = Student::query()->where('id',$id)->with('medicalFile')->get();

        return response()->json([
            "the student" => $student,

        ]);
    }
}
