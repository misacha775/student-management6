<?php

namespace App\Http\Controllers\Grade;

use App\Http\Controllers\Controller;
use App\Student;


class EditController extends Controller
{
    public function __invoke(Student $student, $grade)
    {
        // 成績データを取得
        $gradeData = SchoolGrade::findOrFail($grade);

        return view('grades.edit', [
            'student' => $student,
            'grade'   => $gradeData,
        ]);
    }
}
