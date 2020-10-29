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

/*Route::get('/apartments', 'ApartmentController@apartment')->name('apartment');*/

Route::get('/about', 'AboutController@About')->name('about');

Route::get('/editor', 'EditorController@editor')->middleware('checkroleeditor')->name('editor');

Route::get('/admin', 'AdminController@admin')->middleware('checkrole');

Route::resource('bathrooms','BathroomController')->middleware('checkrole');

Route::resource('districts', 'DistrictController')->middleware('checkrole');

Route::resource('streets', 'StreetController')->middleware('checkrole');

Route::resource('layouts', 'LayoutController')->middleware('checkrole');

Route::resource('renovations', 'RenovationController')->middleware('checkrole');

Route::resource('rooms', 'RoomController')->middleware('checkrole');

Route::resource('services', 'ServiceController')->middleware('checkrole');

Route::resource('statuses', 'StatusController')->middleware('checkrole');

Route::resource('storeynumbers', 'StoreynumberController')->middleware('checkrole');

Route::resource('apartments', 'ApartmentController')->middleware('checkroleeditor');

Route::resource('contracts', 'ContractController')->middleware('checkroleeditor');

Auth::routes();

