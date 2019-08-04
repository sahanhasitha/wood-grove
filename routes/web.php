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

Route::get('login/{provider}', 'Auth\SocialController@redirect');
Route::get('login/{provider}/callback','Auth\SocialController@callback');


//Route::get('facebook', function () {
//    return view('facebook');
//});
//Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook');
//Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');
//
//Route::get('/redirect', 'Auth\LoginController@redirectToProvider');
//Route::get('/callback', 'Auth\LoginController@handleProviderCallback');