<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller; 

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('students.create');
    }
}
