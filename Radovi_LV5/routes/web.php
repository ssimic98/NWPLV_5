<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\CheckNastavnik;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([CheckNastavnik::class . ':nastavnik'])->group(function () {
    Route::get('tasks/create', 'App\Http\Controllers\TaskController@create')->name('task.create');
});

Route::post('tasks', 'App\Http\Controllers\TaskController@store')->name('tasks.store');
Route::get('tasks/added-by-teacher', 'App\Http\Controllers\TaskController@tasksAddedByTeacher')->name('tasks.added-by-teacher');


Route::get('/admin/users','App\Http\Controllers\AdminController@showUsers')->name('admin.users');
Route::post('/admin/users/{id}/assign-role','App\Http\Controllers\AdminController@assignRole')->name('admin.users.assingRole');

