<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolGrade extends Model
{
    protected $fillable = [
        'student_id',
        'grade',
        'term',
        'japanese',
    ];
}
