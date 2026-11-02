<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicalFileRequest;
use App\Http\Requests\UpdateMedicalFileRequest;
use App\Models\MedicalFile;
use App\Models\Student;
use Illuminate\Http\Request;

class MedicalFilesController extends Controller
{

    public function show(int $student_id)
    {
        $student = Student::find($student_id);
        // return $student->medicalFile;
        // MedicalFile::query()->where()->get();
        return response()->json([
            "message" => "medicalfile for student with id: $student_id ",
            "medicalfile" => $student->medicalFile

        ]);
    }
    public function store(StoreMedicalFileRequest $request)
    {

        $medicalfile =  MedicalFile::query()->create($request->validated());
        return response()->json([
            "message" => "medicalfile created successfully",
            "medicalfile" => $medicalfile

        ]);
    }
    public function update(int $id, UpdateMedicalFileRequest $request)
    {

        $medicalfile = MedicalFile::query()->where('id', $id)->update(
            $request->validated()
        );

        return response()->json([
            "message" => "medicalfile updated successfully",
            "medicalfile" => $medicalfile

        ]);
    }
}
