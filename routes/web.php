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

Route::get('/',  'HomeController@index');
Route::get('client/',  'ClientController@index');
Route::get('client/form/',  'ClientController@form');
Route::get('client/{client}/edit/',  'ClientController@edit');
Route::patch('client/{client}',  'ClientController@update');
Route::delete('client/{client}',  'ClientController@delete');
Route::post('client/save/',  'ClientController@save');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
