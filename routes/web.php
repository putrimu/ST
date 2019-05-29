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

Route::get('/', 'WelcomeController@redirect');
Route::get('success', 'WelcomeController@success');
Route::get('pemilihan/rt', 'PemilihanController@rt')->name('RT');
Route::get('pemilihan/rw', 'PemilihanController@rw')->name('RW');
Route::get('/{id}', 'WelcomeController@index');
Route::post('/{id}', 'WelcomeController@pilih');