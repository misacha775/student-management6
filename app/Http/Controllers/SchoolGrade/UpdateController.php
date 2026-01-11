<?php

namespace App\Http\Controllers\SchoolGrade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function __invoke(Request $request, $grade)
    {
        $request->validate([
            'name' => 'required|string|max:50',
        ]);

        DB::table('grade_masters')
            ->where('id', $grade)
            ->update([
                'name' => $request->name,
                'updated_at' => now(),
            ]);


        return redirect('/school-grades')->with('success', '学年を更新しました');
    }
}
