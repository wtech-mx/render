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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'ImageController@index')->name('images.index');


Route::get('image/store','ImageController@store')->name('post.store');
//Route::match(['get', 'post'], 'image/store', 'ImageController@store')->name('post');


Route::resource('images','ImageController');
