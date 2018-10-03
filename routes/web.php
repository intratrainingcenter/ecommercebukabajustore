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


/* END ROUTE FOR BACKEND */


/*
| ROUTE FOR FRONTEND
*/


/*
| END ROUTE FOR FRONTEND
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
