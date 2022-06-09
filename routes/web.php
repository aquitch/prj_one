<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserSubjectController;
use App\Http\Controllers\GradeBookController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::controller(GradeBookController::class)->group(function()
{
    Route::get('/gradebook', 'index')->name('gradebook.index');
    Route::get('/gradebook/test', 'test')->name('gradebook.test');
});

Route::resource('groups', GroupController::class);

Route::resource('subjects', SubjectController::class);

Route::resource('students', StudentController::class);

Route::resource('students.subjects', UserSubjectController::class)
    ->except([ 
        'show', 
        'index', 
    ])
    ->names([
        'create' => 'marks.create',
        'edit' => 'marks.edit'
    ]);