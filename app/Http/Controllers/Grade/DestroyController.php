<?php

namespace App\Http\Controllers\Grade;

use App\Http\Controllers\Controller;
use App\SchoolGrade;

class DestroyController extends Controller
{
    public function __invoke($student, $grade)
    {
        $grade = SchoolGrade::findOrFail($grade);
        $grade->delete();

        return redirect('/students/' . $student);
    }
}
