<?php

namespace App\Http\Controllers\Grade;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    public function __invoke(Student $student, $grade)
    {
        // 成績データを取得
        $gradeData = DB::table('school_grades')->where('id', $grade)->first();

        return view('grades.edit', [
            'student' => $student,
            'grade'   => $gradeData,
        ]);
    }
}
