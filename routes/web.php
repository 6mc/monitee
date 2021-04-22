<?php
use Illuminate\Support\Facades\Auth;
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

Route::get('/signin', function () {
    return view('signin');
//	return redirect("home");
})->name('signin');

Route::get('/logout', function () {
  auth::logout();
  	return redirect("home");
});



Auth::routes();
Route::post('/history', 'photoController@redirecthistory');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/config', 'HomeController@config')->middleware('auth');
Route::post('/config', 'HomeController@editconfig')->middleware('auth');
Route::get('/detail/{id}', 'photoController@detail')->middleware('auth');
Route::get('/history/{id}/{timestamp}', 'photoController@history')->middleware('auth');

Route::get('/live/{id}', 'photoController@live')->middleware('auth');
Route::post('/command', 'EntryController@addCommand');
Route::post('/message', 'EntryController@sendMessage')->middleware('auth');

Route::post('/filterhistory', 'EntryController@filter')->middleware('auth');