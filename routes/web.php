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

    //Data Mahasiswa
    Route::get('/data/mahasiswa', 'Admin\MahasiswaController@index');
    Route::get('/data/mahasiswa/create', 'Admin\MahasiswaController@create');
    Route::post('/data/mahasiswa/store', 'Admin\MahasiswaController@store');
    Route::get('/data/mahasiswa/show/{mahasiswa_id}', 'Admin\MahasiswaController@show');

    //Data Dosen
    Route::resource('/data/dosen', 'Admin\DosenController');

    //Data Kelas
    Route::resource('/data/kelas', 'Admin\KelasController');

    //Data Ruangan
    Route::resource('/data/ruangan', 'Admin\RuanganController');

    //Data Jurusan
    Route::resource('/data/jurusan', 'Admin\JurusanController');

    //Data Mata kuliah
    Route::resource('/data/matakuliah', 'Admin\MataKuliahController');

    //Data Jadwal
    Route::resource('/data/jadwal', 'Admin\JadwalController');

    //Data Nilai
    Route::resource('/data/nilai', 'Admin\NilaiController');

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