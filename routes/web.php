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
Route::resource('stations', 'StationController');
Route::resource('transmissions', 'TransmissionController');

Route::get('/transmissions/{transmission}/confirmAction', 'TransmissionController@confirmAction')->name('transmissions.confirmAction');
Route::get('/cancelAction', function () {
    return redirect()->route('showMyTransmissions')->with('cancelAction', 'Acción cancelada');
})->name('cancelAction');

Route::get('/showMyTransmissions', 'TransmissionController@showMyTransmissions')->name('showMyTransmissions');