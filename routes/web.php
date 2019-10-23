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

Route::get('/logins','loginController@index')->name('login');
Route::post('/checkLogin','loginController@checkLogin');
Route::get('/daftar','loginController@daftar');
Route::post('/postSignup','loginController@_postSignup');


//HAk Akses Web page untuk admin saja
Route::group(['middleware'=>['auth','checkRole:admin']],function(){
    
    // Data Siswa
    Route::get('/dataSiswa','siswaController@index');
    Route::get('/addSiswa','siswaController@addSiswa');
    Route::get('/addSiswaExcel','siswaController@addSiswaExcel');
    Route::post('/postSiswaExcel','siswaController@postSiswaExcel');

    Route::post('/postSiswa','siswaController@postSiswa');
    Route::get('/deleteSiswa/{id}','siswaController@deleteSiswa');
    Route::get('/updateSiswa/{id}','siswaController@updateSiswa');
    Route::post('/postUpdateSiswa','siswaController@postUpdateSiswa');

    // Guru
    Route::get('/dataGuru','guruController@index');
    Route::get('/addGuru','guruController@addGuru');
    Route::post('/postGuru','guruController@postGuru');
    Route::get('/updateGuru/{id}','guruController@updateGuru');
    Route::post('/postUpdateGuru','guruController@postUpdateGuru');
    Route::get('/deleteGuru/{id}','guruController@deleteGuru');

    //Pelajaran
    Route::get('/pelajaran','pelajaranController@index');
    Route::get('/addPelajaran','pelajaranController@addPelajaran');
    Route::get('/deletePelajaran/{id}','pelajaranController@deletePelajaran');
    Route::get('/updatePelajaran/{id}','pelajaranController@updatePelajaran');
    Route::post('/postUpdatePelajaran','pelajaranController@postUpdatePelajaran');
    Route::post('/postPelajaran','pelajaranController@postPelajaran');


    //Kelas
    Route::get('/kelas','kelasController@index');
    Route::get('/addKelas','kelasController@addKelas');
    Route::post('/postKelas','kelasController@postKelas');
    Route::post('/postUpdateKelas','kelasController@postUpdateKelas');
    Route::get('/updateKelas/{id}','kelasController@updateKelas');
    Route::get('/deleteKelas/{id}','kelasController@deleteKelas');

    //Nilai
    Route::get('/nilai','nilaiController@index');
    Route::get('/nilai/resKelas/{id}','nilaiController@resKelas');
    Route::get('/nilai/lihatNilai/{id}','nilaiController@lihatNilai');
    Route::get('/nilai/tambahNilai/{id}','nilaiController@tambahNilai');
    Route::post('/nilai/postNilai/','nilaiController@postNilai');
    Route::get('/nilai/editNilai/{id}','nilaiController@editNilai');
    Route::post('/nilai/postUpdateNilai/','nilaiController@postUpdateNilai');



}); 

// Hak Akses web page untuk admin dan siswa
Route::group(['middleware'=>['auth','checkRole:admin,siswa']],function(){
    Route::get('/admin','adminController@index');
    Route::get('/logout','adminController@logout');
    Route::get('/changePassword','adminController@changePassword');
    Route::post('/postChangePassword','adminController@postChangePassword');
});


// Hak Akses untuk siswa saja
Route::group(['middleware'=>['auth','checkRole:siswa']],function(){
   Route::get('/profile','siswaController@profile');
   Route::get('/siswa/updateProfile/{id}','siswaController@updateProfile');
   Route::post('/siswa/postUpdateProfile/','siswaController@postUpdateProfile');
   Route::get('/siswa/nilai/','siswaController@nilai');
   Route::get('/siswa/printNilai/','siswaController@printNilai');


   // Update Photo Profile
   Route::get('/siswa/updatePhoto/','siswaController@updatePhoto');
   Route::post('/siswa/postUpdatePhoto/','siswaController@postUpdatePhoto');

});
