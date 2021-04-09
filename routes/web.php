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
  //  return view('auth.login');
	return redirect("home");
});



Auth::routes();
Route::post('/history', 'photoController@redirecthistory');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/detail/{id}', 'photoController@detail')->middleware('auth');
Route::get('/history/{id}/{timestamp}', 'photoController@history')->middleware('auth');

Route::get('/live/{id}', 'photoController@live')->middleware('auth');
Route::post('/command', 'EntryController@addCommand');

