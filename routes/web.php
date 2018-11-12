<?php

/* ROUTE FOR BACKEND */
Route::group(['prefix'=>'setup', 'middleware'=>['auth','backendAccess','status']], function ()
{
	Route::get('','Backend\BsetupController@index')->name('setupIndex');
	Route::post('postsetup','Backend\BsetupController@postsetup')->name('setupPost');
});

Route::group(['prefix'=>'dashboard', 'middleware'=>['auth','backendAccess','setup','status']], function ()
{
	Route::get('','DashboardController@index')->name('dashboardIndex');
	Route::get('getdatamember','DashboardController@getdatamember');
	Route::get('gettransactionorder','DashboardController@gettransactionorder');
	Route::get('gettransactionretur','DashboardController@gettransactionretur');
});

Route::group(['prefix'=>'promo', 'middleware'=>['auth','adminAccess','setup','backendAccess','status']], function ()
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

Route::group(['prefix'=>'slider', 'middleware'=>['auth','adminAccess','setup','backendAccess','status']], function ()
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

Route::group(['prefix'=>'story', 'middleware'=>['auth','adminAccess','setup','backendAccess','status']], function ()
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

Route::group(['prefix'=>'position', 'middleware'=>['auth','adminAccess','setup','backendAccess','status']], function ()
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

Route::group(['prefix'=>'category', 'middleware'=>['auth','adminAccess','setup','backendAccess','status']], function ()
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
Route::group(['prefix'=>'product', 'middleware'=>['auth','adminAccess','setup','backendAccess','status']], function ()
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

Route::group(['prefix'=>'user', 'middleware'=>['auth','adminAccess','setup','backendAccess','status']], function ()
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

Route::group(['prefix'=>'about', 'middleware'=>['auth','adminAccess','setup','backendAccess','status']], function ()
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

Route::group(['prefix'=>'profile', 'middleware'=>['auth','setup','backendAccess','status']], function ()
{
	Route::get('','Backend\BprofileController@index')->name('profileIndexBackend');
	Route::put('updateprofile','Backend\BprofileController@updateprofile')->name('updateProfileBackend');
});

Route::group(['prefix'=>'setting', 'middleware'=>['auth','setup','backendAccess','status']], function ()
{
	Route::get('','Backend\BsettingController@index')->name('settingIndex');
	Route::put('updatesetting','Backend\BsettingController@updatesetting')->name('settingUpdate');
});

Route::resource('ContactBack', 'Backend\BcontactsController');

Route::group(['prefix'=>'chats', 'middleware'=>['auth','adminAccess','setup']],function(){
	Route::get('','Backend\BchatsController@index');
	Route::get('/user','Backend\BchatsController@User');
});

Route::group(['prefix'=>'ordertransaction', 'middleware'=>['auth','backendAccess','setup','status']], function ()
{
	Route::get('','Backend\BordertransactionController@index')->name('ordertransactionIndex');
	Route::get('detailorder','Backend\BordertransactionController@detailorder')->name('ordertransactionDetail');
	Route::put('validationprocess','Backend\BordertransactionController@validationprocess')->name('validationprocess');
	Route::put('validationdelivery','Backend\BordertransactionController@validationdelivery')->name('validationdelivery');
	Route::put('validationreceived','Backend\BordertransactionController@validationreceived')->name('validationreceived');
	Route::put('validationcancel','Backend\BordertransactionController@validationcancel')->name('validationcancel');
});

Route::get('/nonActive', 'DashboardController@nonactive');
Route::get('/showsetting', 'Backend\BsettingController@showsetting');
Route::get('/settingfront', 'Backend\BsettingController@settingfront');

Route::group(['prefix'=>'laporanbarang', 'middleware'=>['auth','adminAccess','setup','status']],function(){
	Route::get('','Backend\BlaporanbarangController@index')->name('laporanbarangIndex');
	Route::get('getdataproduck','Backend\BlaporanbarangController@getdataproduck');
	Route::post('searchCtaegory','Backend\BlaporanbarangController@category');
	Route::post('filterwithdate','Backend\BlaporanbarangController@filterwithdate');
});

Route::group(['prefix'=>'Return', 'middleware'=>['auth','backendAccess','setup','status']],function(){
	Route::get('','Backend\BreturnController@index')->name('indexReturn');
	Route::get('processreturn','Backend\BreturnController@returnProcess')->name('processReturn');
	Route::put('validationreturn','Backend\BreturnController@validationReturn')->name('validationReturn');
});

Route::group(['prefix'=>'reporttransaction', 'middleware'=>['auth','adminAccess','setup','status']],function(){
	Route::get('','Backend\BreporttransactionController@showtransaction')->name('reporttransaction');
	Route::post('filter','Backend\BreporttransactionController@showfilter');
});

// Notification
Route::get('notification','Backend\BsettingController@notification');

/* END ROUTE FOR BACKEND */


/* ROUTE FOR FRONTEND */

Route::prefix('promo')->group(function ()
{
	Route::get('show','Frontend\FpromoController@index')->name('frontpromoIndex');
});

Route::prefix('')->group(function ()
{
	Route::get('','Frontend\FhomeController@index')->name('fronthomeIndex');
});

Route::group(['prefix'=>'shop'],function ()
{
	Route::get('/{category}','Frontend\FshopController@index')->name('frontshopIndex');
	Route::get('detailproduct/{id}','Frontend\FshopController@detailproduct')->name('frontdetailProduct');
});

Route::group(['prefix'=>'loginMember','middleware'=>['Authfrontend']],function(){
	Route::get('',function(){
		return view('frontend.Auth.login');
	})->name('formLoginMember');
	Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
	Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
	Route::get('emailresetpassword', function () {
		return view('frontend.Auth.emailresetpassword');
	})->name('emailresetpassword');
});

Route::prefix('RegisterMember')->group(function(){
	Route::get('',function(){
		return view('frontend.Auth.registers');
	})->name('formRegisterMember');
	Route::post('register','Frontend\FRegisterController@register')->name('memberregister');
});

Route::group(['prefix'=>'cart','middleware'=>['memberAcces']],function ()
{
	Route::get('loadcart','Frontend\FcartController@loadcart');
	Route::post('addtocart','Frontend\FcartController@addtocart');
	Route::delete('removefromcart','Frontend\FcartController@removefromcart');
	Route::get('sumproduct','Frontend\FcartController@sumproduct');
	Route::delete('clearcart','Frontend\FcartController@clearcart');
});

Route::group(['prefix'=>'checkout','middleware'=>['memberAcces']],function ()
{
	Route::get('','Frontend\FcheckoutController@index')->name('checkoutIndex');
	Route::get('trackcostshipping','Frontend\FcheckoutController@trackcostshipping');
	Route::get('loadcheckoutproduct','Frontend\FcheckoutController@getlistcart');
	Route::put('updateannotation','Frontend\FcheckoutController@updateannotation');
	Route::get('checkpromo','Frontend\FcheckoutController@checkpromo');

	// route for processing payment
	Route::post('payment', 'Frontend\FpaymentController@payWithpaypal')->name('checkoutPayment');

	// route for check status of the payment
	Route::get('status', 'Frontend\FpaymentController@getPaymentStatus')->name('statusPayment');
});

Route::group(['prefix'=>'mypurchase','middleware'=>['memberAcces']],function ()
{
	Route::get('','Frontend\FmypurchaseController@history')->name('mypurchaseIndex');
	Route::get('detailhistorytransaction','Frontend\FmypurchaseController@detailhistorytransaction')->name('detailHistoryTransaction');
	Route::get('returntransaction','Frontend\FmypurchaseController@retuntransaction')->name('RetunTransaction');
	Route::get('detailretuntransaction','Frontend\FmypurchaseController@detailretuntransaction')->name('DetailRetunTransaction');
	Route::get('listretuntransaction','Frontend\FmypurchaseController@listretuntransaction')->name('listRetunTransaction');
	Route::post('formreturntransaction','Frontend\FmypurchaseController@formretuntransaction')->name('FormRetunTransaction');
	Route::post('processreturntransaction','Frontend\FmypurchaseController@processretuntransaction')->name('processRetunTransaction');
});
Route::resource('ContactUs', 'Frontend\FcontactsController');

Route::group(['prefix'=>'trackorder','middleware'=>['memberAcces']],function ()
{
	Route::get('','Frontend\FtrackorderController@index')->name('trackorderIndex');
	Route::get('tracking','Frontend\FtrackorderController@tracking')->name('trackingOrder');
});

Route::group(['prefix'=>'wishlist','middleware'=>['memberAcces']],function ()
{
	Route::get('','Frontend\FwishlistController@wishlist');
	Route::get('countwishlist','Frontend\FwishlistController@countwishlist');
	Route::get('showproduct','Frontend\FwishlistController@showproduct')->name('wishlist');
	Route::get('addproduct/{idproduct}','Frontend\FwishlistController@addproduct');
	Route::get('removeproduct/{idproduct}','Frontend\FwishlistController@removeproduct');
});

Route::prefix('about')->group(function ()
{
	Route::get('showabout','Frontend\FaboutController@showabout')->name('frontaboutIndex');
});

Route::prefix('story')->group(function ()
{
	Route::get('showstory','Frontend\FstoryController@showstory')->name('frontstoryIndex');
	Route::get('detailshowstory/{idstory}','Frontend\FstoryController@detailstory')->name('detailstory');
});

Route::group(['prefix'=>'profileFront','middleware'=>['memberAcces']], function ()
{
	Route::get('','FprofileController@index')->name('profileIndex');
  Route::put('updateprofile','FprofileController@updateprofile')->name('updateProfile');
});

	Route::group(['prefix'=>'review','middleware'=>['memberAcces']], function ()
{
	Route::get('','Frontend\FreviewController@viewreview')->name('reviewIndex');
	Route::post('addreview','Frontend\FreviewController@addreview')->name('addReview');
	Route::get('showreview','Frontend\FreviewController@showreview');
	Route::get('waitingreview','Frontend\FreviewController@waitingreview');
});
// VerifyEmail
Route::get('/verifyemail', function () {
	return view('frontend.checkstatus');
});
/* END ROUTE FOR FRONTEND */

// verify email
Route::get('/verifyemail/{token}', 'Frontend\FRegisterController@verify');
Auth::routes();


Route::get('/home', 'HomeController@index');
