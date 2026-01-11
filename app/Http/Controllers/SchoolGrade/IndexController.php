<?php

namespace App\Http\Controllers\SchoolGrade;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $grades = DB::table('grade_masters')->orderBy('id')->get();


        return view('school_grades.index', [
            'grades' => $grades,
        ]);
    }
}
