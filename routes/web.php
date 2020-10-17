<?php

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



//Auth::routes();

Route::get('/client/login', 'AuthController@login')->name('login-user');
Route::post('login-check', 'AuthController@loginCheck')->name('login-check');

// client register
Route::get('register/user', 'AuthController@register')->name('register-client');
Route::post('registerSave', 'AuthController@registerSave')->name('client-registerSave');




Route::get('/offer_export/{id?}' , 'Client\ExportExcelController@offerExportSail')->name('offer_export');
Route::get('/template_item_export' , 'Client\ExportExcelController@TemplateItemExport')->name('template_item_export');
Route::get('/template_permanent_export' , 'Client\ExportExcelController@TemplatePermanentExport')->name('template_permanent_export');
Route::get('/template_temporary_export' , 'Client\ExportExcelController@TemplateTemporaryExport')->name('template_temporary_export');


Route::group(['middleware' => ['auth:client'] ],function ()
{

  //auth
  
  //client change his password
  Route::get('client_change_password', 'AuthController@getResetClient')->name('client_change_password');
  Route::post('client_change_password', 'AuthController@updateResetClient')->name('client_change_password');

  Route::get('profile', 'AuthController@profile')->name('profile-client');
  Route::post('profile/save', 'AuthController@profileSave')->name('client-profilesave');

  


  // client logout
  Route::get('client/logout', 'AuthController@logout')->name('client-logout');


//import 
Route::post('/import_permanent', 'ImportController@PermanentItem')->name('import_permanent');
Route::post('/import_temporary', 'ImportController@TemporaryItem')->name('import_temporary');
Route::post('/import_item', 'ImportController@importItem')->name('import_item');


  Route::group([ 'namespace' => 'Client'], function(){

    
    Route::get('/', 'MainController@index')->name('client-home');


    Route::get('/client_sail', 'MainController@clientSail')->name('clients_sail');
    Route::get('/client_reservation', 'MainController@clientReservation')->name('clients_reservation');

    // offers

    Route::get('/permanent_offer', 'OfferController@permanent')->name('permanent_offer');
    Route::get('/temporary_offer', 'OfferController@temporary')->name('temporary_offer');

    //products
    Route::get('/products/{id}', 'ProductController@product')->name('products');
    Route::get('/products/search/client', 'ProductController@productsSearchs')->name('products.client.search');


    Route::get('/cart', 'CartController@index')->name('cart.index');
    Route::post('/cart', 'CartController@store')->name('cart.store');
    Route::post('/cart/update', 'CartController@update')->name('cart.update');
    Route::get('/cart/empty' , 'CartController@empty')->name('cart.empty');
    Route::delete('/cart/{id}', 'CartController@destroy')->name('cart.destroy');


    Route::get('/reservation', 'ReservationsController@index')->name('reservation.index');
    Route::post('reservation', 'ReservationsController@store')->name('reservation.store');
    Route::post('/reservation/update', 'ReservationsController@update')->name('reservation.update');
    Route::get('/reservation/empty' , 'ReservationsController@empty')->name('reservation.empty');
    Route::delete('/reservation/{id}', 'ReservationsController@destroy')->name('reservation.destroy');

    Route::get('/new_order' , 'MainController@newOrder')->name('new_order');
    Route::get('/new_reservation' , 'MainController@newReservation')->name('new_reservation');







});
  



});






