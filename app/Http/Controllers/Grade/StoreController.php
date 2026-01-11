<?php

namespace App\Http\Controllers\Grade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'english'  => 'nullable|integer|min:0|max:100',
        ]);

        DB::table('school_grades')->insert([
            'student_id' => $student->id,
            'grade'      => $request->grade,
            'term'       => $request->term,
            'japanese'   => $request->japanese,
            'math'       => $request->math,
            'english'    => $request->english,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // ★ 自画面へリダイレクト（課題仕様）
        return redirect("/students/{$student->id}/grades/create")
            ->with('success', '成績を登録しました');
    }
}
