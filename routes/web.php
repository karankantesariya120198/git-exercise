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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/insert', 'HomeController@insert')->name('insert');
Route::get('/adddata', 'HomeController@adddata')->name('adddata');
Route::post('/insertdata', 'HomeController@insertdata')->name('insertdata');
Route::get('/edit/{id}', 'HomeController@edit')->name('edit');
Route::get('/delete/{id}', 'HomeController@delete')->name('delete');
Route::post('/updatedata', 'HomeController@updatedata')->name('updatedata');
Route::get('/ajaxdata','HomeController@ajaxdata')->name('ajaxdata');
Route::get('/ajaxinsert','HomeController@ajaxinsert')->name('ajaxinsert');
Route::post('/ajaxRequest','HomeController@ajaxadd')->name('ajaxadd');	

