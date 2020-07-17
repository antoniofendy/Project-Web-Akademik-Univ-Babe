<?php

use App\User;

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

$admin = User::all();

Route::get('/', function () {
    return view('welcome');
});

if(!empty($admin)){
    Auth::routes([
        'register' => false
    ]);
}
else{
    Auth::routes();
}

//route group untuk admin
Route::group(['prefix' => 'administrator'], function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'HomeController@dashboard');
});


//route group untuk mahasiswa
Route::group(['prefix'=>'mahasiswa'], function(){
    Route::get('/login', 'AuthMahasiswa\LoginController@showLoginForm')->name('mahasiswa.login');
    Route::post('/login', 'AuthMahasiswa\LoginController@login')->name('mahasiswa.login.submit');
    Route::get('/', 'MahasiswaController@index')->name('mahasiswa.home');
});

//route group untuk dosen
Route::group(['prefix'=>'dosen'], function(){
    Route::get('/login', 'AuthDosen\LoginController@showLoginForm')->name('dosen.login');
    Route::post('/login', 'AuthDosen\LoginController@login')->name('dosen.login.submit');
    Route::get('/', 'DosenController@index')->name('dosen.home');
});