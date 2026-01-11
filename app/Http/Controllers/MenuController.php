<?php

namespace App\Http\Controllers;

class MenuController extends Controller
{
    public function __invoke()
    {
        return view('menu');
    }
}
