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