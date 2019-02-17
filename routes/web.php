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
Route::get('data/search/{key}', 'hdaController@search');
Route::post('login', 'loginController@login');
Route::get('logout', 'loginController@logout')->name('logout');
Route::get('updateProfile', 'hdaController@viewEdit')->name('viewEdit');
Route::post('updateProfile', 'hdaController@edit')->name('update');
Route::get('admin', 'hdaController@admin')->name('admin');
Route::get('admin/config', function(){
    return view('admin.config');
});
Route::get('keilmuan', function(){
    return view('keilmuan.app');
});

Route::post('reset', 'resetPwdController@reset')->name('reset');
Route::post('update/password', 'resetPwdController@update')->name('updatePwd');