<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student;

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

        $students = $query->orderBy('id', 'desc')->paginate(10);

        $grades = DB::table('school_grades')->orderBy('id')->get();

        return view('students.index', [
            'students' => $students,
            'grades'   => $grades,
        ]);
    }
}
