<?php

use Illuminate\Http\Request;
use App\employee;
use App\photo;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/save', 'EntryController@store');
Route::post('/signup', 'EntryController@signup');
Route::get('/show', 'EntryController@show');

Route::get('/getCommand/{id}', 'EntryController@getCommand');
Route::get('/status', 'photoController@stream');

Route::post('/photo', 'photoController@store');
// Route::get('/test' function (Request $request) {
//    
// });

Route::get('/test', function () {
 // return  \App\photo::find(1)->created_at;
//return \App\photo::where('pc', employee::findorFail(1)->pc)->whereDate('created_at', '=', "05-04-2021")->get();
//return photo::where('pc',$this->pc)->orderBy('created_at', 'desc')->first();
  if (date('H')> 8 && date('H')<18 && date('N') < 6 ) {
echo date('H:i:s');
      }
});