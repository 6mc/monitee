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
    return view('auth.login');
});



Auth::routes();
Route::post('/history', 'photoController@redirecthistory');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/detail/{id}', 'photoController@detail');
Route::get('/history/{id}/{timestamp}', 'photoController@history');

Route::get('/live/{id}', 'photoController@live');
Route::post('/command', 'EntryController@addCommand');

