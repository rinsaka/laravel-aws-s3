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
    return view('welcome');
});

Route::get('/comments', 'CommentsController@index');
Route::get('/comments/list', 'CommentsController@list');
Route::get('/comments/create', 'CommentsController@create');
Route::POST('/comments', 'CommentsController@store');
