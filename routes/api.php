<?php

use Illuminate\Http\Request;
use App\employee;

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
return Carbon\Carbon::createFromTimestamp(1617784610)->toDateString();
});