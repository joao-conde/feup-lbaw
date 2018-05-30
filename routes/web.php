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
Route::get('/feed', 'UserController@getFeedPosts')->name('feed');


// SEARCH
Route::get('/search', 'PagesController@search')->name('search');
Route::post('/do_search', 'PagesController@do_search')->name('do_search');

// STATIC
Route::get('/about', 'PagesController@about');
Route::get('/faqs', 'PagesController@faq');
Route::get('/terms', 'PagesController@terms');

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
Route::post('/admin_api/genres', 'GenresController@create')->middleware('admin');;
Route::delete('/admin_api/genres/{genre_id}', 'GenresController@delete')->middleware('admin');;
Route::put('/admin_api/genres/{genre_id}', 'GenresController@edit')->middleware('admin');;
Route::post('/admin_api/skills', 'SkillsController@create')->middleware('admin');;
Route::delete('/admin_api/skills/{skill_id}', 'SkillsController@delete')->middleware('admin');;
Route::put('/admin_api/skills/{skill_id}', 'SkillsController@edit')->middleware('admin');;

Route::put('/admin_api/users/{id}','UserController@permissions')->middleware('admin');;

Route::put('/admin_api/users/{id}/ignore_report', 'UserController@ignoreReport')->middleware('admin');;
Route::put('/admin_api/bands/{id}/ignore_report', 'BandController@ignoreReport')->middleware('admin');;

Route::put('/admin_api/users/{id}/remove_content', 'UserController@removeContentDueToReport')->middleware('admin');;
Route::put('/admin_api/bands/{id}/remove_content', 'BandController@removeContentDueToReport')->middleware('admin');;

Route::post('/admin_api/users/{id}/reports/{reportId}/warns', 'UserController@warnUser')->middleware('admin');;
Route::post('/admin_api/bands/{id}/reports/{reportId}/warns', 'BandController@warnBand')->middleware('admin');;

Route::post('/admin_api/users/{id}/ban', 'UserController@banUser')->middleware('admin');;
Route::post('/admin_api/bands/{id}/ban', 'BandController@banBand')->middleware('admin');;
Route::put('/admin_api/users/{id}/lift_ban', 'UserController@liftBan')->middleware('admin');;
Route::put('/admin_api/bands/{id}/lift_ban', 'BandController@liftBan')->middleware('admin');;

Route::put('api/users/{id}', 'UserController@editUser');
Route::post('api/users/{id}', 'UserController@editUserPicture');


Route::put('api/user_followers/{id}','UserController@startFollowing');
Route::delete('api/user_followers/{id}','UserController@stopFollowing');

Route::put('api/bands/{id}/followers/{userId}','BandController@startFollowing');
Route::delete('api/bands/{id}/followers/{userId}','BandController@stopFollowing');

Route::put('/api/bands/{bandId}/invitations/{userId}', 'BandController@inviteMember');
Route::post('/api/bands/{bandId}/concerts', 'BandController@scheduleConcert');
Route::post('/api/bands/{bandId}/concertDate', 'BandController@concertDate');
Route::delete('/api/bands/{bandId}/concerts/{concertId}/remove', 'BandController@removeConcert');


Route::put('api/user_skills/{skillId}','UserController@addSkill');
Route::delete('api/user_skills/{skillId}','UserController@deleteSkill');

Route::get('api/bands/{bandId}/posts', 'BandController@getMorePosts');
Route::get('api/users/{userId}/posts', 'UserController@getMorePosts');

Route::delete('/api/band_application/{bandId}/{userId}/canceled', 'BandController@cancelApplication');
Route::put('/api/band_invitation/{bandId}/{userId}/{status}', 'BandController@updateInvitation');
Route::delete('/api/band_membership/{bandId}/{userId}/inactive', 'BandController@removeBandMembership');
Route::delete('/api/band_invitation/{bandId}/{userId}/inactive', 'BandController@removeBandInvitation');

//validate password
Route::post('api/users/{id}/verify_pwd','UserController@validatePassword');
Route::delete('api/users/{id}/location','UserController@deleteLocation');

Route::put('/api/read_notifications','UserController@readNotifications')->name('read_notifications');
Route::get('/api/notifications/{offset}','UserController@getNotifications')->name('get_notifications');
Route::put('/api/read_messages','UserController@readMessages')->name('read_messages');
Route::get('/api/messages/{offset}','UserController@getMessages')->name('get_messages');
Route::get('/api/user_friends','UserController@getFriends');
Route::get('/api/user_followers','UserController@getFollowers');
Route::get('/api/user_following','UserController@api_userFollowing');
Route::get('/api/user_following/all','UserController@api_userFollowingAll');
Route::get('/api/genres','BandController@getGenres');

Route::post('/api/users/{userId}/posts', 'PostController@createPost');
Route::put('/api/users/{userId}/posts/{postId}', 'PostController@editPost');
Route::delete('/api/users/{userId}/posts/{postId}', 'PostController@deletePost');
Route::post('/api/posts/{postId}/comments', 'CommentController@createComment');
Route::delete('/api/comments/{comment}','CommentController@deleteComment');

Route::post('/api/users/{userId}/messages/{friendId}', 'MessageController@store');
Route::get('/api/users/{userId}/messages/{friendId}', 'MessageController@getNewMessages');

// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('do_login')->middleware('not_banned');
Route::get('logout', 'Auth\LoginController@logout')->name('do_logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('do_register');
Route::get('/email', 'Auth\ForgotPasswordController@emailForm')->name('email');
Route::post('/send_email', 'Auth\ForgotPasswordController@sendEmail')->name('send_email');
Route::get('/password/reset/{token}', 'Auth\ForgotPasswordController@resetPassword')->name('reset_pass');
Route::post('/password/update', 'Auth\ForgotPasswordController@updatePassword')->name('update_pass');

// Bands

// Route::get('band/{bandID}', 'BandController@show')->name('band_page');
Route::get('band/{id}', 'BandController@show')->name('band_profile');
Route::get('bands/create_band', 'BandController@create')->name('create_band');
Route::post('bands/do_create_band', 'BandController@store')->name('do_create_band');
Route::get('bands/new_member', 'BandController@getNewMemberPartial');
Route::get('bands/new_genre', 'BandController@getNewGenrePartial');


//Pages
Route::get('users/following', 'UserController@userFollowings')->name('user_followings');
Route::get('users/followers', 'UserController@userFollowers')->name('user_followers');
Route::get('users/bands_following', 'UserController@bandFollowings')->name('bands_following');
Route::get('users/fellow_musicians', 'UserController@fellowMusicians')->name('fellow_musicians');
Route::get('users/bands_membership', 'UserController@bandMemberships')->name('bands_membership');


//Profile
Route::get('users/{id}', 'UserController@show')->name('profile');
Route::get('users/{userId}/posts/{postId}', 'PostController@showPost')->name('post_page');

Route::post('/api/comments/{commentId}/report','CommentController@reportComment');
Route::post('/api/users/{userId}/posts/{postId}/report','PostController@reportPost');
Route::post('/api/users/{userId}/report','UserController@reportUser');


// Errors
Route::get('/403', 'ErrorPagesController@error403');
Route::get('/404', 'ErrorPagesController@error404');