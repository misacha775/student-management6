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
            'grade'    => 'required|integer',
            'term'     => 'required|integer',
            'japanese' => 'nullable|integer|min:0|max:100',
            'math'     => 'nullable|integer|min:0|max:100',
            'english'  => 'nullable|integer|min:0|max:100',
        ]);

        DB::table('school_grades')
            ->where('id', $grade)
            ->update([
                'grade'      => $request->grade,
                'term'       => $request->term,
                'japanese'   => $request->japanese,
                'math'       => $request->math,
                'english'    => $request->english,
                'updated_at' => now(),
            ]);

        // ★ 編集後は自画面へ戻る
        return redirect("/students/{$student->id}/grades/{$grade}/edit")
            ->with('success', '成績を更新しました');
    }
}
