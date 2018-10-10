<?php

// Route::get('/', function () {
// 	return redirect()->route('fronthomeIndex');
// });

/*
| ROUTE FOR PAYMENT PAYPAL
*/
Route::get('paypal','PaymentController@index');
// route for processing payment
Route::post('payment', 'PaymentController@payWithpaypal');
// route for check status of the payment
Route::get('status', 'PaymentController@getPaymentStatus');

/* ROUTE FOR BACKEND */
Route::prefix('setup')->group(function ()
{
	Route::get('','Backend\BsetupController@index')->name('setupIndex');
	Route::post('postsetup','Backend\BsetupController@postsetup')->name('setupPost');
});

Route::group(['prefix'=>'dashboard', 'middleware'=>'setup'], function ()
{
	Route::get('','DashboardController@index')->name('dashboardIndex');
});

Route::group(['prefix'=>'promo', 'middleware'=>'admin', 'middleware'=>'auth', 'middleware'=>'setup'], function ()
{
	Route::get('','Backend\BpromoController@index')->name('promoIndex');
	Route::get('addpromo','Backend\BpromoController@addpromo')->name('promoAdd');
	Route::get('editpromo/{id}','Backend\BpromoController@editpromo')->name('promoEdit');
	Route::put('updatepromo','Backend\BpromoController@updatepromo')->name('promoUpdate');
	Route::post('createpromo','Backend\BpromoController@createpromo')->name('promoCreate');
	Route::get('detailpromo/{id}','Backend\BpromoController@detailpromo')->name('promoDetail');
	Route::delete('deletepromo','Backend\BpromoController@deletepromo')->name('promoDelete');
	Route::get('loaddatapromo','Backend\BpromoController@loaddatapromo');
});

Route::group(['prefix'=>'slider', 'middleware'=>'admin', 'middleware'=>'auth', 'middleware'=>'setup'], function ()
{
	Route::get('','Backend\BsliderController@index')->name('sliderindex');
	Route::get('addslider','Backend\BsliderController@addslider')->name('sliderAdd');
	Route::get('editslider/{id}','Backend\BsliderController@editslider')->name('sliderEdit');
	Route::put('updateslider','Backend\BsliderController@updateslider')->name('sliderUpdate');
	Route::post('createslider','Backend\BsliderController@createslider')->name('sliderCreate');
	Route::get('detailslider/{id}','Backend\BsliderController@detailslider')->name('sliderDetail');
	Route::delete('deleteslider','Backend\BsliderController@deleteslider')->name('sliderDelete');
	Route::get('loaddataslider','Backend\BsliderController@loaddataslider');
});

Route::group(['prefix'=>'story', 'middleware'=>'admin', 'middleware'=>'auth', 'middleware'=>'setup'], function ()
{
  Route::get('','Backend\BstoryController@index')->name('storyIndex');
  Route::get('addstory','Backend\BstoryController@addstory')->name('storyAdd');
  Route::post('createstory','Backend\BstoryController@createstory')->name('storyCreate');
  Route::get('updatestory/{id}','Backend\BstoryController@showupdatestory')->name('ShowstoryUpdate');
  Route::post('updatestory','Backend\BstoryController@updatestory')->name('storyUpdate');
  Route::delete('deletestory','Backend\BstoryController@deletestory')->name('storyDelete');
  Route::get('detailstory/{id}','Backend\BstoryController@detailstory')->name('storyDetail');
  Route::get('loadstory','Backend\BstoryController@loadstory');
});

Route::group(['prefix'=>'position', 'middleware'=>'admin', 'middleware'=>'auth', 'middleware'=>'setup'], function ()
{
	Route::get('','Backend\BpositionController@index')->name('positionIndex');
	Route::get('addposition','Backend\BpositionController@addposition')->name('positionAdd');
	Route::get('editposition/{id}','Backend\BpositionController@editposition')->name('positionEdit');
	Route::put('updateposition','Backend\BpositionController@updateposition')->name('positionUpdate');
	Route::post('createposition','Backend\BpositionController@createposition')->name('positionCreate');
	Route::get('detailposition/{id}','Backend\BpositionController@detailposition')->name('positionDetail');
	Route::delete('deleteposition','Backend\BpositionController@deleteposition')->name('positionDelete');
	Route::get('loaddataposition','Backend\BpositionController@loaddataposition');
});

Route::group(['prefix'=>'category', 'middleware'=>'admin', 'middleware'=>'auth', 'middleware'=>'setup'], function ()
{
	Route::get('','Backend\BcategoryController@index')->name('categoryIndex');
	Route::get('addcategory','Backend\BcategoryController@addcategory')->name('categoryAdd');
	Route::get('editcategory/{id}','Backend\BcategoryController@editcategory')->name('categoryEdit');
	Route::put('updatecategory','Backend\BcategoryController@updatecategory')->name('categoryUpdate');
	Route::post('createcategory','Backend\BcategoryController@createcategory')->name('categoryCreate');
	Route::get('detailcategory/{id}','Backend\BcategoryController@detailcategory')->name('categoryDetail');
	Route::delete('deletecategory','Backend\BcategoryController@deletecategory')->name('categoryDelete');
	Route::get('loaddatacategory','Backend\BcategoryController@loaddatacategory');
});
Route::group(['prefix'=>'product', 'middleware'=>'admin', 'middleware'=>'auth', 'middleware'=>'setup'], function ()
{
  Route::get('','Backend\BproductController@index')->name('productIndex');
  Route::get('formaddproduct','Backend\BproductController@formaddproduct')->name('formaddProduct');
  Route::post('addproduct','Backend\BproductController@addproduct')->name('addProduct');
  Route::get('detailproduct/{id}','Backend\BproductController@detailproduct')->name('detailProduct');
  Route::get('formupdateproduct/{id}','Backend\BproductController@formupdateproduct')->name('formupdateProduct');
  Route::put('updateproduct','Backend\BproductController@updateproduct')->name('updateProduct');
  Route::delete('deleteproduct','Backend\BproductController@deleteproduct')->name('deleteProduct');
  Route::get('loaddataproduct','Backend\BproductController@loaddataproduct');
});

Route::group(['prefix'=>'user', 'middleware'=>'admin', 'middleware'=>'auth', 'middleware'=>'setup'], function ()
{
	Route::get('','Backend\BuserController@index')->name('userIndex');
	Route::get('formadduser','Backend\BuserController@formadduser')->name('formadduser');
	Route::post('adduser','Backend\BuserController@adduser')->name('userCreate');
	Route::get('formupdateuser/{id}','Backend\BuserController@formupdateuser')->name('formuserUpdate');
	Route::post('updateuser','Backend\BuserController@updateuser')->name('userUpdate');
	Route::delete('deleteuser','Backend\BuserController@deleteuser');
	Route::get('detailuser/{id}','Backend\BuserController@detailuser')->name('userDetail');
	Route::get('loaddatauser','Backend\BuserController@loaddatauser');
	Route::post('positionuser','Backend\BuserController@userposition');
});

Route::group(['prefix'=>'about', 'middleware'=>'admin', 'middleware'=>'auth', 'middleware'=>'setup'], function ()
{
	Route::get('','Backend\BaboutController@index')->name('aboutIndex');
	Route::get('addabout','Backend\BaboutController@addabout')->name('aboutAdd');
	Route::get('editabout/{id}','Backend\BaboutController@editabout')->name('aboutEdit');
	Route::put('updateabout','Backend\BaboutController@updateabout')->name('aboutUpdate');
	Route::post('createabout','Backend\BaboutController@createabout')->name('aboutCreate');
	Route::get('detailabout/{id}','Backend\BaboutController@detailabout')->name('aboutDetail');
	Route::delete('deleteabout','Backend\BaboutController@deleteabout')->name('aboutDelete');
	Route::get('loaddataabout','Backend\BaboutController@loaddataabout');
	Route::get('tabledataabout','Backend\BaboutController@tabledataabout');
});

Route::group(['prefix'=>'profile', 'middleware'=>'auth', 'middleware'=>'setup'], function ()
{
	Route::get('','Backend\BprofileController@index')->name('profileIndex');
  Route::put('updateprofile','Backend\BprofileController@updateprofile')->name('updateProfile');
});

Route::group(['prefix'=>'setting', 'middleware'=>'admin', 'middleware'=>'auth', 'middleware'=>'setup'], function ()
{
	Route::get('','Backend\BsettingController@index')->name('settingIndex');
	Route::put('updatesetting','Backend\BsettingController@updatesetting')->name('settingUpdate');
});

/* END ROUTE FOR BACKEND */


/*
| ROUTE FOR FRONTEND
*/

Route::prefix('')->group(function ()
{
	Route::get('','Frontend\FhomeController@index')->name('fronthomeIndex');
});

/*
| END ROUTE FOR FRONTEND
*/
Auth::routes();

Route::get('/home', 'HomeController@index');
