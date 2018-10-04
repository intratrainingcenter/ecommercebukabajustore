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
	Route::get('','BpromoController@index')->name('promoIndex');
	Route::get('addpromo','BpromoController@addpromo')->name('promoAdd');
	Route::post('createpromo','BpromoController@createpromo')->name('promoCreate');
	Route::get('detailpromo/{id}','BpromoController@detailpromo')->name('promoDetail');
});

Route::prefix('product')->group(function ()
{
  Route::get('','Backend\BproductController@index')->name('productIndex');
  Route::get('formaddproduct','Backend\BproductController@formaddproduct')->name('formaddProduct');
  Route::post('addproduct','Backend\BproductController@addproduct')->name('addProduct');
  Route::get('detailproduct/{code}','Backend\BproductController@detailproduct')->name('detailProduct');
  Route::get('formupdateproduct/{code}','Backend\BproductController@formupdateproduct')->name('formupdateProduct');
  Route::put('updateproduct','Backend\BproductController@updateproduct')->name('updateProduct');
  Route::delete('deleteproduct','Backend\BproductController@deleteproduct')->name('deleteProduct');
});

/* END ROUTE FOR BACKEND */


/*
| ROUTE FOR FRONTEND
*/


/*
| END ROUTE FOR FRONTEND
*/
