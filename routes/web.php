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
Route::get('/feed', 'UserController@getFeedPosts')->name('feed');
Route::post('/api/users/{userId}/posts', 'UserController@createPost');
Route::delete('/api/users/{userId}/posts/{postId}', 'UserController@deletePost');


// SEARCH
Route::get('/search', 'PagesController@search')->name('search');
Route::post('/do_search', 'PagesController@do_search')->name('do_search');

// STATIC
Route::get('/about', 'PagesController@about');
Route::get('/faqs', 'PagesController@faq');

// ADMIN
Route::get('/users', 'UserController@listUserPermissions')->middleware('admin');;
Route::get('/banned_users', 'UserController@listBannedUsers')->middleware('admin');;
Route::get('/reported_users', 'UserController@listReportedUsers')->middleware('admin');;
Route::get('/user_reports/', 'UserController@listUserReports')->middleware('admin');;
Route::get('/genres', 'GenresController@list')->middleware('admin');;
Route::get('/skills', 'SkillsController@list')->middleware('admin');;

Route::get('/banned_bands', 'BandController@listBannedBands')->middleware('admin');;
Route::get('/reported_bands', 'BandController@listReportedBands')->middleware('admin');;
Route::get('/band_reports/', 'BandController@listBandReports')->middleware('admin');;


// API
Route::post('/admin_api/genres', 'GenresController@create');
Route::delete('/admin_api/genres/{genre_id}', 'GenresController@delete');
Route::put('/admin_api/genres/{genre_id}', 'GenresController@edit');
Route::post('/admin_api/skills', 'SkillsController@create');
Route::delete('/admin_api/skills/{skill_id}', 'SkillsController@delete');
Route::put('/admin_api/skills/{skill_id}', 'SkillsController@edit');

Route::put('/admin_api/users/{id}','UserController@permissions');

Route::put('/admin_api/users/{id}/ignore_report', 'UserController@ignoreReport');
Route::put('/admin_api/bands/{id}/ignore_report', 'BandController@ignoreReport');

Route::put('/admin_api/users/{id}/remove_content', 'UserController@removeContentDueToReport');
Route::put('/admin_api/bands/{id}/remove_content', 'BandController@removeContentDueToReport');

Route::post('/admin_api/users/{id}/reports/{reportId}/warns', 'UserController@warnUser');
Route::post('/admin_api/bands/{id}/reports/{reportId}/warns', 'BandController@warnBand');

Route::post('/admin_api/users/{id}/ban', 'UserController@banUser');
Route::post('/admin_api/bands/{id}/ban', 'BandController@banBand');
Route::put('/admin_api/users/{id}/lift_ban', 'UserController@liftBan');
Route::put('/admin_api/bands/{id}/lift_ban', 'BandController@liftBan');

Route::put('api/users/{id}', 'UserController@editUser');
Route::post('api/users/{id}', 'UserController@editUserPicture');

Route::put('api/user_followers/{id}','UserController@startFollowing');
Route::delete('api/user_followers/{id}','UserController@stopFollowing');

Route::put('api/bands/{id}/followers/{userId}','BandController@startFollowing');
Route::delete('api/bands/{id}/followers/{userId}','BandController@stopFollowing');

Route::put('api/user_skills/{skillId}','UserController@addSkill');
Route::delete('api/user_skills/{skillId}','UserController@deleteSkill');

Route::get('api/bands/{bandId}/posts', 'BandController@getMorePosts');
Route::get('api/users/{userId}/posts', 'UserController@getMorePosts');

//validate password
Route::post('api/users/{id}/verify_pwd','UserController@validatePassword');
Route::delete('api/users/{id}/location','UserController@deleteLocation');

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
Route::get('/email', 'Auth\ForgotPasswordController@emailForm')->name('email');
Route::post('/send_email', 'Auth\ForgotPasswordController@sendEmail')->name('send_email');
// Auth::routes();

// Bands
Route::get('band/{bandID}', 'BandController@show')->name('band_page');
Route::get('bands/create_band', 'BandController@create')->name('create_band');
Route::post('bands/do_create_band', 'BandController@store')->name('do_create_band');
Route::get('/bands/new_member', 'BandController@getNewMemberPartial');
Route::get('/bands/new_genre', 'BandController@getNewGenrePartial');

//Profile

Route::get('users/{id}', 'UserController@show')->name('profile');


Route::get('/403', 'ErrorPagesController@error403');


//Band Profile

Route::get('bands/{id}', 'BandController@show')->name('band_profile');



