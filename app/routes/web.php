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
Route::get('/dashboard','PagesController@dashboard');

Route::get('/contact','PagesController@contact');
Route::get('/about','PagesController@about');
Route::get('/login','PagesController@login');

Route::get('/preventives','PagesController@preventives');

Auth::routes();


Route::get('/neworder','OrderController@newOrder');
Route::get('/addorder','OrderController@create');
Route::post('/addorder','OrderController@store');
Route::get('/order/edit/{id}','OrderController@edit');
Route::post('/order/edit/{id}','OrderController@update');
Route::delete('/{id}','OrderController@delete');

//*** ADMIN ***//
Route::get('/components','AdminController@components');
Route::get('createComponents', 'AdminController@createComponents');
Route::post('/updateComponents','AdminController@updateComponents');

Route::get('/orders','AdminController@orders');

Route::get('/templates','AdminController@templates');
Route::get('/createTemplates', 'AdminController@createTemplates');
//*** ADMIN ***//


