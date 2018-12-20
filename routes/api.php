<?php
use Illuminate\Http\Request;
Route::group(['middleware' => ['api'],'prefix' => 'en/v1/'], function (){
	
	Route::any('gettoken', 'Api\ApiController@gettoken')->name('gettoken');
	Route::any('getstoretype', 'Api\ApiController@getStoreType')->name('getstoretype');
	Route::any('getstatelist', 'Api\ApiController@getStateList')->name('getstatelist');
	Route::any('getcitylist', 'Api\ApiController@getCitylist')->name('getcitylist');

	//All User Related API
	Route::any('login', 'Api\UserController@login')->name('login');
	Route::any('register', 'Api\UserController@register')->name('register');
	Route::any('sellerregister', 'Api\SellerController@registerAsSeller')->name('sellerregister');
	Route::any('getproductlist', 'Api\UserController@register')->name('getproductlist');
	Route::get('sendemail','Api\UserController@sendEmailReminder');

	//All Sales API
	Route::any('salesregister', 'Api\SaleUserController@register')->name('register');

	//Feedback API
	Route::any('feedbackquery','Api\FeedbackController@feedbackSubmitt')->name('feedbackquery');

});
