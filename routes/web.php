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

Route::get('/', 'PortfolioController@getIndex')->name('home');
Route::get('about', 'PortfolioController@getAbout')->name('about');
Route::get('contact', 'PortfolioController@getContact')->name('contact');


Route::get('/login', 'AdminController@getLogin')->name('login');
Route::post('/login', 'AdminController@postValidateUser')->name('auth');
Route::get('/logout', 'AdminController@getLogout')->name('logout');

Route::get('example', 'PortfolioController@getExample')->name('example');
