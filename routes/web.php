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
Route::get('/search', 'PagesController@search')->name('search');
Route::post('/do_search', 'PagesController@do_search')->name('do_search');

// STATIC
Route::get('/about', 'PagesController@about');
Route::get('/faqs', 'PagesController@faq');

// ADMIN
Route::get('/reported_users', 'PagesController@adminReportedUsers')->middleware('admin');;
Route::get('/reported_bands', 'PagesController@adminReportedBands')->middleware('admin');;
Route::get('/users', 'UserController@listUserPermissions')->middleware('admin');;
Route::get('/genres', 'GenresController@list')->middleware('admin');;
Route::get('/skills', 'SkillsController@list')->middleware('admin');;


// API
Route::post('/admin_api/genres', 'GenresController@create');
Route::delete('/admin_api/genres/{genre_id}', 'GenresController@delete');
Route::put('/admin_api/genres/{genre_id}', 'GenresController@edit');
Route::post('/admin_api/skills', 'SkillsController@create');
Route::delete('/admin_api/skills/{skill_id}', 'SkillsController@delete');
Route::put('/admin_api/skills/{skill_id}', 'SkillsController@edit');
Route::put('/admin_api/users/{id}','UserController@permissions');



Route::put('api/users/{id}', 'ProfilePageController@editUser');
Route::post('api/users/{id}', 'ProfilePageController@editUserPicture');

Route::put('api/user_followers/{id}','ProfilePageController@startFollowing');
Route::delete('api/user_followers/{id}','ProfilePageController@stopFollowing');

Route::put('/api/read_notifications','UserController@readNotifications[')->name('read_notifications');
Route::get('/api/user_friends','UserController@getFriends');
Route::get('/api/user_followers','UserController@getFollowers');
Route::get('/api/user_following','UserController@getFollowing');
Route::get('/api/user_following/all','UserController@getFollowingAll');
Route::get('/api/genres','BandController@getGenres');


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
Route::post('bands/do_create_band', 'BandController@store')->name('do_create_band');
Route::get('/bands/new_member', 'BandController@getNewMemberPartial');
Route::get('/bands/new_genre', 'BandController@getNewGenrePartial');

//Profile

Route::get('users/{id}', 'ProfilePageController@show')->name('profile');


Route::get('/403', 'ErrorPagesController@error403');


//validate password
Route::post('api/users/{id}/verify_pwd','ProfilePageController@validatePassword');
