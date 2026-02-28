<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;

class AjaxController extends Controller
{
    public function __invoke(Request $request)
    {
        $sort = $request->get('sort') === 'desc' ? 'desc' : 'asc';
        $sortBy = $request->input('sort_by', 'grade');

        $query = Student::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('grade')) {
            $query->where('grade', $request->grade);
        }

        if ($request->filled('sort')) {
            $query->orderBy($sortBy, $sort);
        } else {
            $query->orderBy('id', 'desc');
        }

        return response()->json($query->get());
    }
}