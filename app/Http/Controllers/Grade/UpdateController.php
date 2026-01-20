<?php

namespace App\Http\Controllers\Grade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student;

class UpdateController extends Controller
{
    public function __invoke(Request $request, Student $student, $grade)
    {
        $request->validate([
            'grade'    => 'required',
            'term'     => 'required',
            'japanese' => 'required|integer',
        ]);

        $gradeData = SchoolGrade::findOrFail($grade);
        $gradeData->update([
            'grade'    => $request->grade,
            'term'     => $request->term,
            'japanese' => $request->japanese,
        ]);

        return redirect("/students/{$student->id}/grades/{$grade}/edit")
            ->with('success', '成績を更新しました');
    }
}
