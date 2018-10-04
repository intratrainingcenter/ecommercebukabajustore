<?php

Route::get('/', function () {
	return redirect()->route('dashboardIndex');
});

/*
| ROUTE FOR PAYMENT PAYPAL
*/
Route::get('paypal','PaymentController@index');
// route for processing payment
Route::post('payment', 'PaymentController@payWithpaypal');
// route for check status of the payment
Route::get('status', 'PaymentController@getPaymentStatus');

/* ROUTE FOR BACKEND */

Route::prefix('dashboard')->group(function ()
{
	Route::get('','DashboardController@index')->name('dashboardIndex');
});

Route::prefix('promo')->group(function ()
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

Route::prefix('story')->group(function()
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
Route::prefix('position')->group(function ()
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

Route::prefix('product')->group(function ()
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

Route::prefix('user')->group(function ()
{
	Route::get('','Backend\BuserController@index')->name('userIndex');
	Route::get('formadduser','Backend\BuserController@formadduser')->name('formadduser');
	Route::post('positionuser','Backend\BuserController@userposition');
});

/* END ROUTE FOR BACKEND */


/*
| ROUTE FOR FRONTEND
*/


/*
| END ROUTE FOR FRONTEND
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
