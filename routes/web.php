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
    return view('backend.dashboard.index');
})->name('dashboard');

Route::get('/brand','BrandController@read')->name('brand');
Route::post('/brand/create','BrandController@create');
Route::get('/brand/{id}/edit','BrandController@edit');
Route::put('/brand/{id}/update','BrandController@update');
Route::get('/brand/{id}/delete','BrandController@delete');

Route::get('/mobil','MobilController@read')->name('mobil');
Route::post('/mobil/create','MobilController@create');
Route::get('/mobil/{id}/edit','MobilController@edit');
Route::put('/mobil/{id}/update','MobilController@update');
Route::get('/mobil/{id}/delete','MobilController@delete');

Route::get('/type','TypeController@read')->name('type');
Route::post('/type/create','TypeController@create');
Route::get('/type/{id}/edit','TypeController@edit');
Route::put('/type/{id}/update','TypeController@update');
Route::get('/type/{id}/delete','TypeController@delete');