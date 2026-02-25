<?php

namespace App\Http\Controllers\Grade;

use App\Http\Controllers\Controller;
use App\Student;
use App\SchoolGrade;


class EditController extends Controller
{
    public function __invoke(Student $student, $grade)
    {
        
        $gradeData = SchoolGrade::findOrFail($grade);

        return view('grades.edit', [
            'student' => $student,
            'grade'   => $gradeData,
        ]);
    }
}
