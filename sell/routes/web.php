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

Route::get('/', function () {
    return redirect('/sell');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Pages Controller
Route::get('sell', 'PagesController@index')->name('sell-home');
Route::get('sell/product', 'PagesController@product');
Route::get('sell/product/confirm', 'PagesController@confirm');
Route::get('location', 'PagesController@getLocation');


//profile routes
Route::resource('/profile', 'ProfileController');

//shop routes
Route::resource('/shop', 'ShopController');

//handling bids
Route::resource('/bid', 'BidController');
Route::post('/bid/placebid/{id}', 'BidController@storeBid');


//product routes
Route::resource('/product', 'ProductController');
Route::get('user/products', 'ProductController@allProducts')->name('user.products');


//noifications routes
Route::get('get/notifications', 'NotificationController@getNotifications')->name('notifications');
Route::get('all/notifications', 'NotificationController@allNotifications');

//Search routes
Route::get('/products/search/{category}', 'SearchController@index');
Route::post('/products/search', 'SearchController@search');

//Admin routes
Route::get('/admin', 'AdminController@index');
Route::get('/all/users', 'AdminController@getUsers')->name('all.users');
Route::get('/all/products', 'AdminController@catalog')->name('catalog');


//test routes
Route::get('nav', 'TestController@index');


//messages
Route::resource('messages', 'MessagesController');