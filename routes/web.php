<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::group(['middleware' => ['web']], function () {
	Route::get('/', function () {
		return view('welcome');
	});
	Route::any('rest/login', 'Rest\LoginController@login');
	Route::get('rest/code', 'Rest\LoginController@code');
	Route::get('rest/test', 'Rest\LoginController@test');
});

Route::group(['middleware' => ['web','rest.login'], 'namespace' => 'Rest', 'prefix' => 'rest'], function () {

	Route::get('index', 'IndexController@index');
	Route::get('info', 'IndexController@info');
	Route::get('quit', 'LoginController@quit');
	Route::any('pass', 'IndexController@pass');
});

