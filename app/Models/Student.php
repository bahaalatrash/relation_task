<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
#[Fillable('name')]
class Student extends Model
{
    public function medicalFile (){
        return $this->hasOne(MedicalFile::class,'student_id');
    }
}
