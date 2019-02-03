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
/*
Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/','front\HomeController@index'); //Anasayfa
Route::get('/admin','admin\HomeController@index'); //Anasayfa

//Ürün İşlemleri

Route::get('/admin/urunler','admin\UrunlerController@index');
Route::get('/admin/urun/edit/{id}','admin\UrunlerController@edit');
Route::get('/admin/urun/del/{id}','admin\UrunlerController@destroy');
Route::get('/admin/urun/show/{id}','admin\UrunlerController@show');
Route::get('/admin/urun/ekle','admin\UrunlerController@create');
Route::post('/admin/urun/save','admin\UrunlerController@store');
Route::post('/admin/urun/update/{id}','admin\UrunlerController@update');
