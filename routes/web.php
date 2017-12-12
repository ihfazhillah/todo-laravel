<?php

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

Route::get('/', 'TodoController@show');

Route::post('/todos', 'TodoController@create');
Route::post('/todos/mark-all-completed', 'TodoController@markAllAsCompleted');

Route::post('/todos/{id}', 'TodoController@update');
Route::delete('/todos/{id}', 'TodoController@delete');
