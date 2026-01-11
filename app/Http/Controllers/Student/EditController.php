<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Student;

class EditController extends Controller
{
    public function __invoke($student)
    {
        $student = Student::findOrFail($student);

        return view('students.edit', [
            'student' => $student,
        ]);
    }
}
