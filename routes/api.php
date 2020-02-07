<?php

use Illuminate\Http\Request;

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

Route::get('/mobil','MobilApiController@read')->name('mobil');
Route::get('/mobil/{brand}','MobilApiController@read');
Route::get('/mobil/{brand}/{type}','MobilApiController@read');

Route::post('/mobil/{brand}/{type}','mobilApiController@create');

//Route::get('/mobil/{brand}/{type}','MobilApiController@edit');
Route::put('/mobil/{brand}/{type}/{id}','MobilApiController@update');

Route::delete('/mobil/{brand}/{type}/{id}','MobilApiController@delete');