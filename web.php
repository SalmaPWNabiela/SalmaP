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
    // return view('welcome');
    echo "SELAMAT DATANG SALEMA";
});

Route::get('/satu', function () {
    // return view('welcome');
    echo "ONE";
});

Route::get('/dua', function () {
    // return view('welcome');
    echo "TWO";
});

Route::get('/tiga', function () {
    // return view('welcome');
    echo "THREE";
});

Route::get('/empat', function () {
    // return view('welcome');
    echo "FOUR";
});

Route::get('/lima', function () {
    // return view('welcome');
    echo "FIVE";
});

Route::get('/enam', function () {
    // return view('welcome');
    echo "SIX";
});

Route::get('/tujuh', function () {
    // return view('welcome');
    echo "SEVEN";
});

Route::get('/delapan', function () {
    // return view('welcome');
    echo "EIGHT";
});

Route::get('/sembilan', function () {
    // return view('welcome');
    echo "NINE";
});

Route::get('/sepuluh', function () {
    //return view('welcome');
    echo "ten";
});

Route::get('/sepuluh', function () {
    return view('telo');
    //lokasi view
});

Route::get('/nemplate', function () {
    return view('template');
    //lokasi view
});

//3. MANGGIL CONTROLLER
Route::get('/usang', 'UsangController@index');
/* file controllernya namanya usangController
    nama url usang
    index nama functionnya 
*/
Route::get('/', 'Kontak@index');

Route::get('/CleaningService', 'CleanerController@cleaner');

Route::get('/terong', 'kentang@sandal');

Route::get('/', 'Contact@index');

Route::resource('Kontak', 'Contact');

Route::get('/', function(){
    return view('index');
});

Route::get('login', 'Login@index');
Route::post('login/cek','Login@cek');
Route::post('/','Dashboard@index');
Route::get('/logout','login@logout');

Route::resource('/satpam', 'Satpam');

Route::resource('/kabupaten', 'kabupaten');

Route::resource('/penjualan', 'penjualan');
Route::resource('/barang', 'barang');
Route::resource('/pembelian', 'pembelian');