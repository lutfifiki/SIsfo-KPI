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
    return view('home');
});

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');


Route::group(['middleware' => ['auth','CheckRole:admin']],function(){
Route::get('/karyawan','KaryawanController@index'); //@index == Nama Method yang berada dalam KaryawanController
Route::post('/karyawan/create', 'KaryawanController@create'); 
Route::get('/karyawan/{id}/edit', 'KaryawanController@edit');
Route::post('/karyawan/{id}/update', 'KaryawanController@update');
Route::get('/karyawan/{id}/delete', 'KaryawanController@delete');
Route::get('/karyawan/{id}/profile', 'KaryawanController@profile');
Route::post('/karyawan/{id}/addpendapatan', 'KaryawanController@addpendapatan');
});

Route::group(['middleware' => ['auth','CheckRole:admin,karyawan']],function(){

Route::get('/dashboard','DashboardController@index');

});


