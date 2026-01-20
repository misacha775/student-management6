<?php

namespace App\Http\Controllers\Grade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SchoolGrade;

class AjaxController extends Controller
{
    public function __invoke(Request $request, $student)
    {
        $query = SchoolGrade::where('student_id', $student);

        if ($request->filled('grade')) {
            $query->where('grade', $request->grade);
        }

        if ($request->filled('term')) {
            $query->where('term', $request->term);
        }

        return response()->json(
            $query->orderBy('id', 'desc')->get()
        );
    }
}
