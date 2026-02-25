<?php

namespace App\Http\Controllers\Grade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use App\SchoolGrade; 

class UpdateController extends Controller
{
    public function __invoke(Request $request, Student $student, $grade)
    {
        $request->validate([
            'grade'    => 'required|integer',
            'term'     => 'required|integer',

            'japanese' => 'nullable|integer|min:0|max:100',
            'math'     => 'nullable|integer|min:0|max:100',
            'science'  => 'nullable|integer|min:0|max:100',
            'social_studies' => 'nullable|integer|min:0|max:100',
            'music'    => 'nullable|integer|min:0|max:100',
            'home_economics' => 'nullable|integer|min:0|max:100',
            'english'  => 'nullable|integer|min:0|max:100',
            'art'      => 'nullable|integer|min:0|max:100',
            'health_and_physical_education' => 'nullable|integer|min:0|max:100',
        ]);

        $gradeData = SchoolGrade::findOrFail($grade);

        $gradeData->update([
            'grade'    => $request->grade,
            'term'     => $request->term,
            'japanese' => $request->japanese,
            'math'     => $request->math,
            'science'  => $request->science,
            'social_studies' => $request->social_studies,
            'music'    => $request->music,
            'home_economics' => $request->home_economics,
            'english'  => $request->english,
            'art'      => $request->art,
            'health_and_physical_education' => $request->health_and_physical_education,
        ]);

        return redirect("/students/{$student->id}")
            ->with('success', '成績を更新しました');
    }
}