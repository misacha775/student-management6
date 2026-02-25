<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Support\Facades\DB;

class PromoteController extends Controller
{
    public function __invoke()
    {
        DB::transaction(function () {
            Student::query()->increment('grade');
        });

        return redirect('/menu')->with('success', '学年を更新');
    }
}