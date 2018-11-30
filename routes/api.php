<?php
use Illuminate\Http\Request;
Route::group(['prefix' => 'en/v1/'], function (){
	Route::any('login', 'Api\UserController@login')->name('login');
	Route::any('gettoken', 'Api\ApiController@gettoken')->name('gettoken');
	Route::any('register', 'Api\UserController@register')->name('register');
});
