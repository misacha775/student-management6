<?php

namespace App\Http\Controllers\SchoolGrade;

use App\Http\Controllers\Controller;
use App\GradeMaster;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
      

$grades = GradeMaster::orderBy('id')->get();



        return view('school_grades.index', [
            'grades' => $grades,
        ]);
    }
}
