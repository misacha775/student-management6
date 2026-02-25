<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'student_number',
        'name',
        'grade',
        'address',
        'comment',
        'img_path',
    ];

    public function schoolGrades()
    {
        return $this->hasMany(SchoolGrade::class, 'student_id');
    }
}