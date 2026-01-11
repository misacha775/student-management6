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
}
