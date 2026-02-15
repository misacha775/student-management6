<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $path = null;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('students', 'public');
        }

        Student::create([
            'name'     => $request->name,
            'address'  => $request->address,
            'img_path' => $path,
        ]);

        // 
        return redirect('/menu');
    }
}

