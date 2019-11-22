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
Route::get('updateProfile/', 'hdaController@viewEdit')->name('viewEdit');
Route::get('updateProfile/{npm}', 'hdaController@viewEdit')->name('viewEdit');
Route::post('updateProfile', 'hdaController@edit')->name('update');
Route::get('admin', 'adminController@index');
Route::get('admin/user', 'adminController@user');
Route::get('admin/config', 'adminController@config');
Route::get('admin/pathways', 'keilmuanController@adminPathways');
Route::get('admin/djournal', 'keilmuanController@adminDjournal');
Route::get('admin/del_pathways/{filename}', 'keilmuanController@deletePathways');
Route::get('admin/del_djournal/{filename}', 'keilmuanController@deleteDjournal');
Route::post('upload_pathways', 'keilmuanController@addPathways');
Route::post('upload_djournal', 'keilmuanController@addDjournal');
Route::get('keilmuan/pathways', 'keilmuanController@index');
Route::get('keilmuan/djournal', 'keilmuanController@showDjournal');
Route::get('keilmuan/addCounter/{filename}', 'keilmuanController@updateCounter');
Route::get('keilmuan/addCounterDjournal/{filename}', 'keilmuanController@updateDjournal');
Route::get('credit', function(){
    return view('content.credit ');
});

Route::post('reset', 'resetPwdController@reset')->name('reset');
Route::post('update/password', 'resetPwdController@update')->name('updatePwd');
Route::post('kepanitiaan/add', 'hdaController@addKepanitiaan');
Route::get('kepanitiaan/delete/{id}', 'hdaController@deleteKepanitiaan');
Route::post('organisasi/add', 'hdaController@addOrganisasi');
Route::get('organisasi/delete/{id}', 'hdaController@deleteOrganisasi');
Route::post('prestasi/add', 'hdaController@addPrestasi');
Route::get('prestasi/delete/{id}', 'hdaController@deletePrestasi');
Route::post('seminar/add', 'hdaController@addSeminar');
Route::get('seminar/delete/{id}', 'hdaController@deleteSeminar');
