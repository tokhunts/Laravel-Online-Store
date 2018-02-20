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

Route::get('/', 'Core@index')->name('home');

Route::match(['get', 'post'],'category/{cat_name}-products','Core@getCategory')->name('category');

Route::match(['get', 'post'],'product/id={id}','Core@getProduct')->name('product/id=');
Route::match(['get', 'post'],'/cart', 'Core@getCart')->name('cart');/*->middleware('auth');*/
Route::match(['get', 'post'],'/set','Core@setCookies')->name('set');
Route::get('/del-cookies/id={id}','Core@delCookies')->name('del-cookies/id=');
Route::get('/order/id={id}','Core@order')->name('order/id=');

Route::match(['get', 'post'],'/categories','Core@getCats')->name('categories');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
