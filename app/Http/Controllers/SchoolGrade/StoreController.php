<?php

namespace App\Http\Controllers\SchoolGrade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GradeMaster;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
        ]);

        GradeMaster::create([
            'name' => $request->name,
        ]);
        
        return redirect('/school-grades')->with('success', '学年を追加しました');
    }
}
