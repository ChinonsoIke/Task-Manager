<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('tasks', 'TasksController');
Route::resource('projects', 'ProjectController', ['except'=> ['create']]);
Route::get('/tasks/projects/{id}', 'TasksController@getProject', ['except'=> ['update']])->name('tasks.getProject');
Route::post('/tasks/{tasks}', 'TasksController@update')->name('tasks.update');

Route::get('/', 'TasksController@index')->name('index');
