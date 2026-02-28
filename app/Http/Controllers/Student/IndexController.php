<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student;
use App\GradeMaster;


class IndexController extends Controller
{
   public function __invoke(Request $request)
{
    $query = Student::query();

    if ($request->filled('name')) {
        $query->where('name', 'like', '%' . $request->name . '%');
    }

    if ($request->filled('grade')) {
        $query->where('grade', $request->grade);
    }

    $sort = $request->input('sort');
    $sortBy = $request->input('sort_by', 'id');

    if ($sort) {
        $query->orderBy($sortBy, $sort);
    } else {
       
        $query->orderBy('id', 'desc');
    }

    $students = $query
        ->with('schoolGrades')
        ->paginate(10);

    $grades = GradeMaster::orderBy('id')->get();

    return view('students.index', [
        'students' => $students,
        'grades'   => $grades,
    ]);
}
}
