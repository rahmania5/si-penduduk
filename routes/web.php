<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PendudukController@index');

/** Routing Pengelolaan Penduduk */
Route::get('penduduk', 'PendudukController@index')->name('penduduk.index');  //routing lihat daftar penduduk
Route::get('penduduk/create', 'PendudukController@create')->name('penduduk.create'); //routing tampilkan form data penduduk 
Route::post('penduduk', 'PendudukController@store')->name('penduduk.store'); //routing simpan data penduduk
Route::get('penduduk/{id}', 'PendudukController@show')->name('penduduk.show'); //routing tampilkan detail penduduk
Route::get('penduduk/{id}/edit', 'PendudukController@edit')->name('penduduk.edit');  //routing tampilkan form edit penduduk
Route::patch('penduduk/{penduduks}', 'PendudukController@update')->name('penduduk.update'); //routing simpan perubahan data penduduk
Route::delete('penduduk/{id}', 'PendudukController@destroy')->name('penduduk.destroy'); //routing hapus data penduduk 

/** Routing Pengelolaan Kartu Keluarga */
Route::get('kartukeluarga', 'KartuKeluargaController@index')->name('kartu_keluarga.index');  //routing lihat daftar kartu keluarga
Route::get('kartukeluarga/create', 'KartuKeluargaController@create')->name('kartu_keluarga.create'); //routing tampilkan form tambah kartu keluarga
Route::post('kartukeluarga', 'KartuKeluargaController@store')->name('kartu_keluarga.store'); //routing simpan data kartu keluarga
Route::get('kartukeluarga/{kartukeluargas}/edit', 'KartuKeluargaController@edit')->name('kartu_keluarga.edit');  //routing tampilkan form edit kartu keluarga
Route::patch('kartukeluarga/{kartukeluargas}', 'KartuKeluargaController@update')->name('kartu_keluarga.update'); //routing simpan perubahan data kartu keluarga

/** Routing Pengelolaan Anggota Keluarga */
Route::get('anggotakeluarga/{id}', 'AnggotaKeluargaController@index')->name('anggotakeluarga.index'); //routing tampilkan anggota keluarga
Route::post('anggotakeluarga', 'AnggotaKeluargaController@store')->name('anggotakeluarga.store'); //routing simpan data anggota keluarga
Route::delete('anggotakeluarga/{id}', 'AnggotaKeluargaController@destroy')->name('anggotakeluarga.destroy'); //routing hapus anggota keluarga

/** Routing Tampilan Laporan */
Route::get('laporan1', 'PendudukController@laporan1')->name('laporan.laporan1');  //routing lihat daftar penduduk usia produktif
Route::get('laporan2', 'PendudukController@laporan2')->name('laporan.laporan2');  //routing lihat daftar penduduk berdasarkan nagari
