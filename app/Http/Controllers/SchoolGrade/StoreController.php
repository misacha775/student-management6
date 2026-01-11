<?php

namespace App\Http\Controllers\SchoolGrade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
        ]);

        DB::table('grade_masters')->insert([
            'name' => $request->name,
            'created_at' => now(),
            'updated_at' => now(),
            ]);


        return redirect('/school-grades')->with('success', '学年を追加しました');
    }
}
