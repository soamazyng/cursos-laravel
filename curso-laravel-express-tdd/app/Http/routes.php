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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('ola', 'TestController@index');
// Route::get('ola/{nome}', 'TestController@index');
// Route::get('notas', 'TestController@notas');

Route::get('/', 'PostsController@index');

//pega todas as functions e vira rotas
Route::controllers([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController',
	]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

	Route::get('', ['as' => 'admin.posts.index', 'uses' => 'PostsAdminController@index']);

	Route::group(['prefix' => 'posts'], function(){

		Route::get('', ['as' => 'admin.posts.index', 'uses' => 'PostsAdminController@index']);
		Route::get('create', ['as' => 'admin.posts.create', 'uses' => 'PostsAdminController@create']);
		Route::get('edit/{id}', ['as' => 'admin.posts.edit', 'uses' => 'PostsAdminController@edit']);
		Route::post('store', ['as' => 'admin.posts.store', 'uses' => 'PostsAdminController@store']);
		Route::put('update/{id}', ['as' => 'admin.posts.update', 'uses' => 'PostsAdminController@update']);
		Route::get('destroy/{id}', ['as' => 'admin.posts.destroy', 'uses' => 'PostsAdminController@destroy']);

	});

});