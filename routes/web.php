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

Route::get('/', 'LogController@showDefault');
Route::get('/log/{date}', 'LogController@show');

Route::get('entry/add', 'LogEntryController@add');
Route::post('entry', 'LogEntryController@add');
Route::post('entry/add', 'LogEntryController@save');
Route::get('entry/search', 'LogEntryController@search');

Route::get('/SearchQuery', 'SearchController@search');
