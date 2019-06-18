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

Route::get('/', 'ArticleMain@index');
Route::get('/admin', 'loginController@index');
Route::post('/admin', 'LoginController@validationUsers');
Route::group(['namespace' => 'Admin'], function()
{
    Route::get('/articles', array('as' => 'Articles', 'uses' => 'ArticleController@index'));
    Route::get('/articles/create', ('ArticleController@create'));
    Route::post('/articles', 'ArticleController@store');
    Route::get('/articles/edit/{id}', 'ArticleController@edit');
    Route::put('/articles/update/{id}','ArticleController@update');
    Route::delete('/articles/{id}', 'ArticleController@delete');
    Route::get('/articles/{id}', 'ArticleController@show');
    Route::post('/showCreate', 'ArticleController@showCreate');
    Route::put('/showCreate', 'ArticleController@showCreate');
    Route::post('/showEdit', 'ArticleController@showEdit');
    Route::put('/showEdit', 'ArticleController@showEdit');
});
Route::get('/search', 'ArticleMain@search');
