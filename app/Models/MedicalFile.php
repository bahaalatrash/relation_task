<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
#[Fillable('blood_type','student_id','emergency_phone_number')]
class MedicalFile extends Model
{
    public function student (){
        return $this->belongsTo(Student::class,'student_id');
    }
}
