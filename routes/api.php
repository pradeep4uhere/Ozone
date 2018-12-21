<?php
use Illuminate\Http\Request;
Route::group(['prefix' => 'en/v1/'], function (){
	
	Route::any('gettoken', 'Api\ApiController@gettoken')->name('gettoken');
	Route::any('getstoretype', 'Api\ApiController@getStoreType')->name('getstoretype');
	

	//All User Related API
	Route::any('login', 'Api\UserController@login')->name('login');
	Route::any('register', 'Api\UserController@register')->name('register');
	Route::any('sellerregister', 'Api\SellerController@registerAsSeller')->name('sellerregister');
	Route::any('getproductlist', 'Api\UserController@register')->name('getproductlist');
	Route::get('sendemail','Api\UserController@sendEmailReminder');
	Route::any('updateuserprofile','Api\UserController@updateUserProfile')->name('updateuserprofile');
	

	//All Sales API
	Route::any('salesregister', 'Api\SaleUserController@register')->name('register');

	/*******************All Master List Here************************************/

	//Location API
	Route::any('getstatelist', 'Api\GeneralController@getStateList')->name('getstatelist');
	Route::any('getdistrictlist', 'Api\GeneralController@getDistrictList')->name('getdistrictlist');
	Route::any('getlocationlist', 'Api\GeneralController@getAllLocationList')->name('getlocationlist');

	//Categpry List
	Route::any('getallcategorylist', 'Api\GeneralController@getAllCategoryList')->name('getallcategorylist');

	//Store Type List
	Route::any('getstoretypelist', 'Api\GeneralController@getStoreTypeList')->name('getstoretypelist');


	//Brand Type List
	Route::any('getbrandtypelist', 'Api\GeneralController@getBrandTypeList')->name('getbrandtypelist');

	//Master Unit Type List
	Route::any('getunitlist', 'Api\GeneralController@getMasterUnitList')->name('getunitlist');



	/*******************All Master List Here************************************/


	//Add New Product
	Route::any('addnewproduct', 'Api\ProductController@addNewProduct')->name('addnewproduct');
	Route::any('uploadimage', 'Api\ProductController@uploadimage')->name('uploadimage');
	
	

	//Feedback API
	Route::any('feedbackquery','Api\FeedbackController@feedbackSubmitt')->name('feedbackquery');

	//Location Search
	Route::any('getlocation','Api\GeneralController@getLocationResult')->name('getlocation');

	//Seller List
	Route::any('getsellerlist','Api\SellerController@getSellerList')->name('getsellerlist');



});
