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

Route::get('/','Controller@index')->name('inicio');

Auth::routes(['verify' => true]);
Route::post('/home', 'HomeController@add')->name('cart');
Route::get('/home/{id}', 'HomeController@index')->name('home.detalle');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@close')->name('logout');
Route::get('/cart','CartController@show')->name('cart')->middleware('verified');
Route::post('/cart/plus','CartController@action')->name('cart.plus')->middleware('verified');;
Route::post('/cart/remove','CartController@remove')->name('cart.remove')->middleware('verified');;
Route::post('/cart/end','CartController@end')->name('cart.end')->middleware('verified');
Route::get('/user','UserController@index')->name('user')->middleware('auth');
Route::post('/user/update','UserController@update')->name('user.update')->middleware('auth');
Route::post('/user/addAddress','UserController@addAddress')->name('addAddress')->middleware('auth');
Route::get('/user/removeAddres/{id}','UserController@removeAddress')->name('removeAddres')->middleware('auth');


