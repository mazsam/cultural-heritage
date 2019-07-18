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

Route::get('/user-input', 'UserInputController@index');
Route::get('/user-input/tambah', 'UserInputController@add');
Route::post('/user-input/store', 'UserInputController@store');
Route::get('/user-input/del/{id}', 'UserInputController@del');
Route::get('/user-input/edit/{id}', 'UserInputController@edit');
Route::post('/user-input/update', 'UserInputController@update');
