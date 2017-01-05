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
		return redirect('rest');
	});
	Route::any('rest', 'Rest\LoginController@login');
	Route::get('rest/code', 'Rest\LoginController@code');
	Route::get('test', 'TestController@test');
});

Route::group(['middleware' => ['web','rest.login'], 'namespace' => 'Rest', 'prefix' => 'rest'], function () {

	Route::get('index', 'IndexController@index');
	Route::get('welcome', 'IndexController@welcome');
	Route::get('info', 'IndexController@info');
	Route::get('quit', 'LoginController@quit');
	Route::any('pass', 'IndexController@pass');

	Route::resource('user', 'UserController');
	Route::post('project/changeorder', 'ProjectController@changeorder');
	Route::resource('project', 'ProjectController');

	Route::resource('userpicture', 'UserpictureController');
	Route::resource('ugc', 'UgcController');
	Route::resource('column', 'ColumnController');
	Route::resource('tpass', 'TpassController');
	Route::resource('uc', 'UcController');
	Route::resource('regression', 'RegressionController');
});

