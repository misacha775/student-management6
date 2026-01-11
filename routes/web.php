<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return auth()->check() ? redirect('/menu') : redirect('/login');
});


// ログイン後の遷移先
Route::get('/home', 'HomeController@index')->name('home');

/**
 * ログイン必須
 */
Route::middleware('auth')->group(function () {

    Route::get('/menu', 'MenuController');

    /**
     * 学年マスタ
     */
    Route::get('/school-grades', 'SchoolGrade\IndexController');
    Route::post('/school-grades', 'SchoolGrade\StoreController');
    Route::patch('/school-grades/{grade}', 'SchoolGrade\UpdateController');

    /**
     * 学生
     */
    Route::get('/students', 'Student\IndexController');
    Route::get('/students/create', 'Student\CreateController');
    Route::post('/students', 'Student\StoreController');

    Route::get('/students/{student}', 'Student\ShowController');
    Route::get('/students/{student}/edit', 'Student\EditController');
    Route::patch('/students/{student}', 'Student\UpdateController');
    Route::delete('/students/{student}', 'Student\DestroyController');

    /**
     * 成績（学生に紐づく）
     */
    Route::get('/students/{student}/grades/create', 'Grade\CreateController');
    Route::post('/students/{student}/grades', 'Grade\StoreController');

    Route::get('/students/{student}/grades/{grade}/edit', 'Grade\EditController');
    Route::patch('/students/{student}/grades/{grade}', 'Grade\UpdateController');
    Route::delete('/students/{student}/grades/{grade}', 'Grade\DestroyController');

});

