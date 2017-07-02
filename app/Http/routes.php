<?php

Route::get('/', 'realty_controller@index');
Route::resource('/realty','realty_controller');

Route::post('/search-type/{type}', function($type){
	return view('front.realty.search_type')->with("type", $type);
});

//Route::resource('add/{id}/{comment}','realty_controller@add');
Route::post('add/{id}/{comment}','realty_controller@add');
// Auth routes - Raina

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function() {
	Route::get('/', 'AuthController@getLogin');
	Route::post('login', 'AuthController@postLogin');
	Route::post('login/{id}','realty_controller@show({id})');
	Route::get('logout', 'AuthController@getLogout');
	Route::get('register', 'AuthController@getRegister');
	Route::post('register', 'AuthController@postRegister');
});
Route::controller('chat','chatController');

Route::group(['prefix' => '/search'], function() {
	Route::post('/price', 'search_controller@price');
	Route::post('/country', 'search_controller@country');
	Route::post('/area', 'search_controller@area');
	Route::post('/city', 'search_controller@city');
	Route::post('/region', 'search_controller@region');
	Route::post('/type', 'search_controller@type');
});
