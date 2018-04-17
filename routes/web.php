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
    return redirect('login');
});

// FEED
// Route::get('/users/{id}/posts', 'FeedController@getPosts');
Route::get('/feed', 'FeedController@getPosts')->name('feed');

// SEARCH
Route::get('/search', 'FeedController@search');

// STATIC
Route::get('/about', 'PagesController@about');
Route::get('/faqs', 'PagesController@faq');

// ADMIN
Route::get('/reported_users', 'PagesController@adminReportedUsers');
Route::get('/reported_bands', 'PagesController@adminReportedBands');
Route::get('/users', 'PagesController@adminUsers');
Route::get('/genres', 'GenresController@list');
Route::get('/skills', 'PagesController@adminSkills');


// Cards
Route::get('cards', 'CardController@list');
Route::get('cards/{id}', 'CardController@show');

// API
Route::post('api/genres', 'GenresController@create');
Route::delete('api/genres/{genre_id}', 'GenresController@delete');

Route::put('api/cards', 'CardController@create');
Route::delete('api/cards/{card_id}', 'CardController@delete');
Route::put('api/cards/{card_id}/', 'ItemController@create');
Route::post('api/item/{id}', 'ItemController@update');
Route::delete('api/item/{id}', 'ItemController@delete');

Route::put('api/users/{id}', 'ProfilePageController@editUser');

Route::put('api/user_followers/{id}','ProfilePageController@startFollowing');
Route::delete('api/user_followers/{id}','ProfilePageController@stopFollowing');

// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('do_login');
Route::get('logout', 'Auth\LoginController@logout')->name('do_logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('do_register');
// Auth::routes();

// Bands
Route::get('band/{bandID}', 'BandController@show')->name('band_page');
Route::get('bands/create_band', 'BandController@create')->name('create_band');
Route::post('api/bands/create_band', 'BandController@store')->name('do_create_band');

//Profile

Route::get('users/{id}', 'ProfilePageController@show')->name('profile');


