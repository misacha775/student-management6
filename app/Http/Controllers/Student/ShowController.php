<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use App\SchoolGrade;

class ShowController extends Controller
{
    public function __invoke(Request $request, Student $student)
    {
        $query = SchoolGrade::where('student_id', $student->id);

        if ($request->filled('grade')) {
            $query->where('grade', $request->grade);
        }

        if ($request->filled('term')) {
            $query->where('term', $request->term);
        }

        $grades = $query->orderBy('grade')->orderBy('term')->get();

        return view('students.show', [
            'student' => $student,
            'grades'  => $grades,
        ]);
    }
}
