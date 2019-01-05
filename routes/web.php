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
    return view('content.landing');
})->name('homepage');
Route::get('hda', 'hdaController@index');
Route::get('hda/angkatan/{tahun}', 'hdaController@angkatan');
Route::get('hda/anggota/{bk}', 'hdaController@bk');
Route::get('data/anggota/{npm}', 'hdaController@getDataAnggota');
Route::post('login', 'loginController@login');
Route::get('logout', 'loginController@logout');
Route::get('edit', function(){
    return view('content.editProfile');
})->name('viewEdit');
Route::put('editProfile', 'hdaController@edit')->name('editProfile');