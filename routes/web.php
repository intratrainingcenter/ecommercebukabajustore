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

Route::prefix('story')->group(function()
{
  Route::get('','Backend\BstoryController@index')->name('storyIndex');
  Route::get('addstory','Backend\BstoryController@addstory')->name('storyAdd');
  Route::post('createstory','Backend\BstoryController@createstory')->name('storyCreate');
  Route::get('updatestory/{id}','Backend\BstoryController@updatestory')->name('storyUpdate');
  Route::get('detailstory/{id}','Backend\BstoryController@detailstory')->name('storyDetail');
});


/* END ROUTE FOR BACKEND */


/*
| ROUTE FOR FRONTEND
*/


/*
| END ROUTE FOR FRONTEND
*/
