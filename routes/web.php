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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('home', 'HomeController@index')->name('home');

/**
 * Auth routes
 */
Route::get('login/{provider}', 'Auth\SocialController@redirect');
Route::get('login/{provider}/callback','Auth\SocialController@callback');
Route::post('social-register','Auth\SocialController@doRegister')->name('social-register');

Route::get('types', 'CompanyController@types')->name('types');
Route::get('add-new-type/{id?}','CompanyController@addNewType')->name('add-new-type');
Route::post('store-type-details','CompanyController@storeTypeDetails')->name('store-type-details');
Route::get('delete-type/{id}', 'CompanyController@deleteType')->name('delete-type');
Route::get('get-type', 'CompanyController@getType')->name('get-type');
Route::post('update-type','CompanyController@updateType')->name('update-type');

Route::get('companies', 'CompanyController@companies')->name('companies');
Route::get('add-new-company/{id?}', 'CompanyController@addNewCompany')->name('add-new-company');
Route::post('store-company-details', 'CompanyController@storeCompanyDetails')->name('store-company-details');
Route::get('delete-company/{id}', 'CompanyController@deleteCompany')->name('delete-company');
Route::get('get-company', 'CompanyController@getCompany')->name('get-company');
Route::post('update-company', 'CompanyController@updateCompany')->name('update-company');

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('users', 'UserController@users')->name('users');
    Route::get('add-new-user/{id?}', 'UserController@addNewUser')->name('add-new-user');
    Route::post('store-user-details', 'UserController@storeUserDetails')->name('store-user-details');
    Route::get('delete-user/{id}', 'UserController@deleteUser')->name('delete-user');
    Route::get('get-user', 'UserController@getUser')->name('get-user');
    Route::get('view-get-user', 'UserController@viewGetUser')->name('view-get-user');
    Route::post('update-user', 'UserController@updateUser')->name('update-user');
});

Route::get('products', 'ProductController@products')->name('products');
Route::get('add-new-product/{id?}', 'ProductController@addNewProduct')->name('add-new-product');
Route::get('add-new-product-image/{id?}', 'ProductController@addNewProductImage')->name('add-new-product-image');
Route::post('store-product-details', 'ProductController@storeProductDetails')->name('store-product-details');
Route::get('delete-product/{id}', 'ProductController@deleteProduct')->name('delete-product');
Route::get('get-product', 'ProductController@getProduct')->name('get-product');
Route::post('update-product', 'ProductController@updateProduct')->name('update-product');
Route::post('upload-product-image', 'ImageController@uploadProductImage')->name('upload-product-image');
Route::get('delete-product-image/{id}', 'ImageController@deleteProductImage')->name('delete-product-image');

Route::get('services', 'ServiceController@services')->name('services');
Route::get('add-new-service/{id?}', 'ServiceController@addNewService')->name('add-new-service');
Route::get('add-new-service-image/{id?}', 'ServiceController@addNewServiceImage')->name('add-new-service-image');
Route::post('store-service-details', 'ServiceController@storeServiceDetails')->name('store-service-details');
Route::get('delete-service/{id}', 'ServiceController@deleteService')->name('delete-service');
Route::get('get-service', 'ServiceController@getService')->name('get-service');
Route::post('update-service', 'ServiceController@updateService')->name('update-service');
Route::post('upload-service-image', 'ImageController@uploadServiceImage')->name('upload-service-image');
Route::get('delete-service-image/{id}', 'ImageController@deleteServiceImage')->name('delete-service-image');

Route::get('reservations', 'ReservationController@reservations')->name('reservations');
Route::get('add-new-reservation/{id?}', 'ReservationController@addNewReservation')->name('add-new-reservation');
Route::get('add-new-reservation-image/{id?}', 'ReservationController@addNewReservationImage')->name('add-new-reservation-image');
Route::post('store-reservation-details', 'ReservationController@storeReservationDetails')->name('store-reservation-details');
Route::get('delete-reservation/{id}', 'ReservationController@deleteReservation')->name('delete-reservation');
Route::get('get-reservation', 'ReservationController@getReservation')->name('get-reservation');
Route::post('update-reservation', 'ReservationController@updateReservation')->name('update-reservation');
Route::post('upload-reservation-image', 'ImageController@uploadReservationImage')->name('upload-reservation-image');
Route::get('delete-reservation-image/{id}', 'ImageController@deleteReservationImage')->name('delete-reservation-image');

Route::get('events', 'EventController@events')->name('events');
Route::get('add-new-event/{id?}', 'EventController@addNewEvent')->name('add-new-event');
Route::get('add-new-event-image/{id?}', 'EventController@addNewEventImage')->name('add-new-event-image');
Route::post('store-event-details', 'EventController@storeEventDetails')->name('store-event-details');
Route::get('delete-event/{id}', 'EventController@deleteEvent')->name('delete-event');
Route::get('get-event', 'EventController@getEvent')->name('get-event');
Route::post('update-event', 'EventController@updateEvent')->name('update-event');
Route::post('upload-event-image', 'ImageController@uploadEventImage')->name('upload-event-image');
Route::get('delete-event-image/{id}', 'ImageController@deleteEventImage')->name('delete-event-image');

Route::get('registrations', 'HomeController@users');
