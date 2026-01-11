<?php

namespace App\Http\Controllers\Grade;

use App\Http\Controllers\Controller;
use App\Student;

class CreateController extends Controller
{
    public function __invoke(Student $student)
    {
        return view('grades.create', [
            'student' => $student,
        ]);
    }
}
