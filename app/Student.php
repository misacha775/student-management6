<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
   public function schoolGrades()
    {
        return $this->hasMany(SchoolGrade::class, 'student_id');
 }
}