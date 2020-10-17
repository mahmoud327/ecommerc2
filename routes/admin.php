<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// admin change password for client
Auth::routes();

Route::group(['middleware' => ['auth:web']],function(){
// 
Route::get('edit/profile/admin', 'AuthController@editProfileAdmin')->name('edit-profile-admin');
Route::post('edit/profile/admin/update', 'AuthController@editProfileAdminUpdate')->name('edit-profile-admin-update');

Route::get('offers-hide/{id}', 'ClientController@hideOffer')->name('offer.hide');
Route::get('offers-show/{id}', 'ClientController@showOffer')->name('offer.showoffer');

Route::get('admin-change-password-for-client', 'AuthController@adminPasswordClient')->name('admin-change-password-for-client');
Route::post('admin-change-password-for-client-update', 'AuthController@adminPasswordClientUpdate')->name('admin-change-password-for-client-update');

// admin change his password
Route::get('client-change-password', 'AuthController@getResetAdmin')->name('admin-change-password');
Route::post('client-change-password', 'AuthController@updateResetAdmin')->name('admin-update-password');

Route::group(['namespace'=>'Admin'],function(){

Route::get('notification', 'NotificationController@notification');

Route::get('update/notification/client/{id}', 'NotificationController@updateClient')->name('update-notification-client');
Route::get('update/notification/sail/{id}', 'NotificationController@updateSail')->name('update-notification-sail');
Route::get('update/notification/reservation/{id}', 'NotificationController@updateReservation')->name('update-notification-reservation');
  
  
  

Route::get('/', 'DashboardController@index')->name('admin.dashboard');
Route::resource('item', 'ItemController');
Route::get('item/more/sail', 'ItemController@moreSail')->name('item.more.sail');
Route::get('item/more/res', 'ItemController@moreRes')->name('item.more.res');


Route::resource('catogry', 'CatogryController');
Route::resource('offerpermanent', 'OfferpermanentController');
Route::resource('offertempory', 'OffertemporyController');
Route::resource('offerdetailst', 'OffertempController');


Route::get('clients-activate/{id}', 'ClientController@showclient')->name('clients.activate');
Route::get('clients-deactivate/{id}', 'ClientController@hideclient')->name('clients.deactivate');
Route::resource('clients', 'ClientController');
Route::get('more', 'ClientController@clientMore')->name('clients.more');
Route::resource('order', 'OrderController');
Route::resource('resarve', 'resarveController');
Route::resource('product', 'ProductController');
Route::resource('type', 'TypeController');

Route::get('/search/resarve', 'resarveController@search')->name('resarve.search');
Route::get('/search/client', 'ClientController@search')->name('client.search');
Route::get('/search/temp', 'OfferController@searchTemp')->name('temp.search');
Route::get('/search/per', 'OfferController@search')->name('per.search');
Route::get('/search/product', 'ProductController@search')->name('search.product');
Route::get('/search/type', 'ProductController@search')->name('search.type');

Route::get('/search/item', 'ItemController@search')->name('search.item');
Route::get('/search/order', 'OrderController@search')->name('search.order');



Route::resource('category','CategoryController');
Route::get('categorychildren/{id}','CategoryController@categorychildren')->name('categorychildren');

Route::resource('offer','OfferController');
Route::get('offers/permanent','OfferController@permanent')->name('offer.permanent');
Route::get('offers/temporary','OfferController@temporary')->name('offer.temporary');
Route::get('offers-hide/{id}', 'OfferController@hideOffer')->name('offer.hide');
Route::get('offers-show/{id}', 'OfferController@showOffer')->name('offer.showoffer');

Route::get('children', 'CategoryController@children')->name('children');
Route::resource('product','ProductController');



});

});

