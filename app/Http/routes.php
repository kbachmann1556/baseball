<?php


Route::get('/', function () {
    return view('landing');
});

Route::group(['middleware' => ['web']], function () {

	Route::any(\Config::get('paths.FE_GET_CHAMPIONS'), 'RequestController@getAllChampions');
	Route::any(\Config::get('paths.FE_GET_MASTERY'), 'RequestController@getMastery');
});

