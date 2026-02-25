<?php

namespace App\Http\Controllers\Grade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SchoolGrade;
use App\Student; 
class StoreController extends Controller
{
    public function __invoke(Request $request, Student $student)
    {
       $request->validate([
    'grade'    => 'required|integer',
    'term'     => 'required|integer',

    'japanese' => 'nullable|integer|min:0|max:100',
    'math'     => 'nullable|integer|min:0|max:100',
    'science'  => 'nullable|integer|min:0|max:100',
    'social_studies'   => 'nullable|integer|min:0|max:100',
    'music'    => 'nullable|integer|min:0|max:100',
    'home_economics'  => 'nullable|integer|min:0|max:100',
    'english'  => 'nullable|integer|min:0|max:100',
    'art'      => 'nullable|integer|min:0|max:100',
    'health_and_physical_education'       => 'nullable|integer|min:0|max:100',
]);

       SchoolGrade::create([
    'student_id' => $student->id,
    'grade'      => $request->grade,
    'term'       => $request->term,
    'japanese'   => $request->japanese,
    'math'       => $request->math,
    'science'    => $request->science,
    'social_studies'     => $request->social_studies,
    'music'      => $request->music,
    'home_economics'    => $request->home_economics,
    'english'    => $request->english,
    'art'        => $request->art,
    'health_and_physical_education'         => $request->health_and_physical_education,
]);

        return redirect("/students/{$student->id}/grades/create")
            ->with('success', '成績を登録しました');
    }
}