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
    return view('index');
});

Route::get('/api/contact/{id?}', 'ContactController@index');
Route::post('/api/contact', 'ContactController@store');
Route::post('/api/contact/{id}', 'ContactController@update');
Route::delete('/api/contact/{id}', 'ContactController@destroy');
