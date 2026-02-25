<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Student;

class EditController extends Controller
{
    public function __invoke(Student $student)
{
    return view('students.edit', compact('student'));
}
}
