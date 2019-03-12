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

Route::get('/news', 'NewsController@index')->name('news');
Route::get('/news/form', 'NewsController@formNews')->name('formNews');
Route::post('/news/simpan', 'NewsController@simpan')->name('simpanNews');
Route::get('/news/form/{newsId}', 'NewsController@formEditNews')->name('formEditNews');
Route::post('/news/ganti', 'NewsController@ganti')->name('gantiNews');
Route::get('/news/hapus/{newsId}', 'NewsController@hapus')->name('hapusNews');

Route::get('/category', 'CategoryController@index')->name('category');
Route::get('/category/form', 'CategoryController@formKategori')->name('formKategori');
Route::post('/category/simpan', 'CategoryController@simpan')->name('simpanKategori');
Route::get('/category/form/{categoryId}', 'CategoryController@formEditKategori')->name('formEditKategori');
Route::post('/category/ganti', 'CategoryController@ganti')->name('gantiKategori');
Route::get('/category/hapus/{categoryId}', 'CategoryController@hapus')->name('hapusKategori');