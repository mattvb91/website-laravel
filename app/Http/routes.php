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


Route::group(['middleware' => ['web']], function ()
{

    Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);

    Route::get('article/{article}', ['as' => 'article', 'uses' => 'ArticleController@show']);
    Route::get('article', ['as' => 'blog', 'uses' => 'ArticleController@index']);

    Route::get('tag', ['as' => 'tags', 'uses' => 'TagController@index']);
    Route::get('tag/{tag}', ['as' => 'tag', 'uses' => 'TagController@show']);

    // Authentication routes...
    Route::get('login', ['as' => 'auth', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'auth', 'uses' => 'Auth\LoginController@login']);
    Route::get('logout', ['as' => 'auth', 'uses' => 'Auth\LoginController@logout']);

    Route::get('search', ['as' => 'search', 'uses' => 'SearchController@search']);

});

Route::group(['prefix' => 'api'], function ()
{
    Route::post('image', ['middleware' => 'auth', 'uses' => 'Api\ImageController@store']);
    Route::get('image/{image}', 'Api\ImageController@view');
});

//TODO for later on it would be nice to automatically be able to route to custom pages

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function ()
{
    Route::resource('article', 'Admin\ArticleController');
    Route::resource('tag', 'Admin\TagController');
    Route::resource('page', 'Admin\PageController');
});