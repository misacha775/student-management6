<?php

namespace App\Http\Controllers\SchoolGrade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GradeMaster;

class UpdateController extends Controller
{
    public function __invoke(Request $request, $grade)
    {
        $request->validate([
            'name' => 'required|string|max:50',
        ]);

        $gradeMaster = GradeMaster::findOrFail($grade);
        $gradeMaster->update([
            'name' => $request->name,
        ]);

        return redirect('/school-grades')->with('success', '学年を更新しました');
    }
}
