<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Student;

class DestroyController extends Controller
{
    public function __invoke($student)
    {
        $student = Student::findOrFail($student);
        $student->delete();

        return redirect('/students');
    }
}
