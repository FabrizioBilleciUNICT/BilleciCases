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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/','PagesController@welcome');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/dashboard','PagesController@preventives');

Route::get('/contact','PagesController@contact');
Route::get('/about','PagesController@about');
Route::get('/login','PagesController@login');

Route::get('/preventives','PagesController@preventives');

Auth::routes();


Route::get('/neworder','PagesController@order');
Route::get('/addorder','OrderController@create');
Route::post('/addorder','OrderController@store');
Route::get('/order/edit/{id}','OrderController@edit');
Route::post('/order/edit/{id}','OrderController@update');
Route::delete('/{id}','OrderController@delete');
