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

//route group untuk mahasiswa
Route::group(['prefix'=>'mahasiswa'], function(){
    Route::get('/login', 'AuthMahasiswa\LoginController@showLoginForm')->name('mahasiswa.login');
    Route::post('/login', 'AuthMahasiswa\LoginController@login')->name('mahasiswa.login.submit');
    Route::get('/', 'MahasiswaController@index')->name('mahasiswa.home');
});
