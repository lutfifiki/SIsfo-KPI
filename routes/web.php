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
Route::get('/karyawan/{id}/editUK', 'KaryawanController@editUK');
Route::post('/karyawan/{id}/updateUK', 'KaryawanController@updateUK');
Route::post('/karyawan/{id}/update', 'KaryawanController@update');
Route::get('/karyawan/{id}/delete', 'KaryawanController@delete');
Route::get('/karyawan/{id}/profile', 'KaryawanController@profile');
Route::post('/karyawan/{id}/addpendapatan', 'KaryawanController@addpendapatan');

Route::get('/unit_kerja', 'UnitkerjaController@index');
Route::post('/unit_kerja/create', 'UnitkerjaController@create');
Route::get('unit_kerja/{id}/edit', 'UnitkerjaController@edit');
Route::post('/unit_kerja/{id}/update', 'UnitkerjaController@update');
Route::get('/unit_kerja/{unitkerja}/delete', 'UnitkerjaController@delete');
Route::get('/unit_kerja/{id}/profile', 'UnitkerjaController@profile');
Route::post('/unit_kerja/{id}/addnilai', 'UnitkerjaController@addnilai');
Route::get('/unit_kerja/{id}/deletenilai', 'UnitkerjaController@deletenilai');

Route::get('/aspek_penilaian', 'AspekpenilaianController@index');
Route::post('/aspek_penilaian/create', 'AspekpenilaianController@create');
Route::get('/aspek_penilaian/{id}/delete', 'AspekpenilaianController@delete');
Route::get('/aspek_penilaian/{id}/edit', 'AspekpenilaianController@edit');
Route::post('/aspek_penilaian/{id}/update', 'AspekpenilaianController@update');

Route::get('/rapor', 'RaporController@index');
Route::get('/rapor/{id}/profile', 'RaporController@profile');
});

Route::group(['middleware' => ['auth','CheckRole:admin,AdminUK,karyawan']],function(){

Route::get('/dashboard','DashboardController@index');
Route::get('/unit_kerja/profile_unitkerja', 'UnitkerjaController@profilunit');
Route::post('/unit_kerja/postdata', 'UnitkerjaController@postdata');
Route::get('/unit_kerja/{id}/deletedata', 'UnitkerjaController@deletedata');
Route::get('/unit_kerja/{id}/editdata', 'UnitkerjaController@editdata');	
Route::post('/unit_kerja/{id}/updatedata', 'UnitkerjaController@updatedata');
Route::get('/unit_kerja/profile_users', 'UnitkerjaController@profileus');
Route::get('/karyawan/index_users', 'KaryawanController@indexs' );
Route::get('/karyawan/{id}/edit_users', 'KaryawanController@editdata');
Route::post('karyawan/{id}/updatedata', 'KaryawanController@updatedata');
Route::get('karyawan/{id}/deletedata', 'KaryawanController@deletedata');
Route::post('karyawan/createUsers', 'KaryawanController@createUsers');
});



