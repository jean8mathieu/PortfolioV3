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


Route::group([
    'middleware' => [
        'auth'
    ]
], function () {
    Route::get('/logout', 'AdminController@getLogout')->name('logout');

    // /admin
    Route::group([
        'prefix' => 'admin'
    ], function () {
        Route::get('/', 'AdminController@getIndex')->name('admin');

        //Article
        Route::group([
            'prefix' => 'article'
        ], function () {
            Route::get('list', 'ArticleController@getList')->name('articleList');
            Route::get('create', 'ArticleController@getCreate')->name('articleCreate');
            Route::get('edit/{id}', 'ArticleController@getEdit')->name('articleUpdate');
            Route::get('update', 'ArticleController@postCreateUpdate')->name('articleCreateUpdate');
        });


        //Project
        Route::group([
            'prefix' => 'project'
        ], function () {
            Route::get('list', 'ProjectController@getList')->name('projectList');
            Route::get('create', 'ProjectController@getCreate')->name('projectCreate');
            Route::get('edit/{id}', 'ProjectController@getEdit')->name('projectUpdate');
            Route::get('update', 'ProjectController@postCreateUpdate')->name('projectCreateUpdate');
        });
    });
});

