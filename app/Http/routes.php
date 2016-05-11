<?php


Route::get('/', 'RequestController@landing');

Route::group(['middleware' => ['web']], function () {

	Route::any(\Config::get('paths.FE_GET_PLAYER'), 'RequestController@getPlayer');
	Route::any(\Config::get('paths.FE_ADD_PLAYER'), 'RequestController@addPlayer');
	Route::any(\Config::get('paths.FE_LOAD_CHART'), 'RequestController@loadChart');

});

