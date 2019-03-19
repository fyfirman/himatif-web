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
Route::get('admin', 'adminController@index');
Route::get('admin/user', 'adminController@user');
Route::get('admin/config', 'adminController@config');
Route::get('admin/pathways', 'keilmuanController@adminIndex');
Route::get('admin/del_pathways/{filename}', 'keilmuanController@deleteFile');
Route::post('upload_pathways', 'keilmuanController@addFile');
Route::get('keilmuan/pathways', 'keilmuanController@index');
Route::get('admin/djournal', function(){
    return view('admin.djournalContent');
});
Route::get('credit', function(){
    return view('content.credit ');
});

Route::post('reset', 'resetPwdController@reset')->name('reset');
Route::post('update/password', 'resetPwdController@update')->name('updatePwd');