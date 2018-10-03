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

Route::prefix('category')->group(function ()
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





/* END ROUTE FOR BACKEND */


/*
| ROUTE FOR FRONTEND
*/


/*
| END ROUTE FOR FRONTEND
*/
