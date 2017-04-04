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

Route::get('/', function () {
    return view('diary');
});

Route::get('/', 'LogController@show');

Route::get('entry/add', 'LogEntryController@add');
Route::post('entry/add', 'LogEntryController@save');
