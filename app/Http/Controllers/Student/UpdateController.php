<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;

class UpdateController extends Controller
{
    public function __invoke(Request $request, $student)
    {
        $student = Student::findOrFail($student);

        $student->update([
            'student_number' => $request->student_number,
            'name'           => $request->name,
            'grade'          => $request->grade,
            'address'        => $request->address,
            'comment'        => $request->comment,
        ]);

        return redirect('/students/' . $student->id . '/edit');

    }
}
