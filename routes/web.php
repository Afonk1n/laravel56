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
Route::get('/', 'HomeController@index')->name('home');

Route::get('/apartments', 'ApartmentController@apartment')->name('apartment');

Route::get('/about', 'AboutController@About')->name('about');

Route::get('/admin', 'AdminController@admin')->middleware('checkrole');

Route::get('/editor', 'EditorController@editor')->middleware('checkroleeditor');

Auth::routes();

