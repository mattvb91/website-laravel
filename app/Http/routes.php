<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);

Route::get('article/{article}', ['as' => 'article', 'uses' => 'ArticleController@show']);
Route::get('article', ['as' => 'blog', 'uses' => 'ArticleController@index']);

Route::get('tag', ['as' => 'tags', 'uses' => 'TagController@index']);
Route::get('tag/{tag}', ['as' => 'tag', 'uses' => 'TagController@show']);

// Authentication routes...
Route::get('auth/login', ['as' => 'auth', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', ['as' => 'auth', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth', 'uses' => 'Auth\AuthController@getLogout']);

Route::group(['prefix' => 'admin'], function ()
{
    Route::resource('article', 'Admin\ArticleController');
});