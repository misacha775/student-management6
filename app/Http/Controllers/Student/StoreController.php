<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        Student::create([
            'student_number' => $request->student_number,
            'name'           => $request->name,
            'grade'          => $request->grade,
            'address'        => $request->address,
            'comment'        => $request->comment,
            'img_path'       => null,
        ]);

        return redirect('/students');
    }
}
