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

// Route::get('/', function () {
//     return view('welcome');
// });

/*********Main Pages**********/
Route::get('/','PagesController@index');
Route::get('/practice-areas','PagesController@practiceAreas')->name('practice.areas');
/*********End Main Pages**********/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@UserLogout')->name('users.logout');


// Attorneys pages
Route::get('/profile/{id}',"AttorneysController@profile")->name('profile');
Route::get('/attorney_dashboard',"AttorneysController@dashboard")->name('attorney_dashboard');
Route::get('/attorney_register',"Auth\AttorneysRegisterController@showRegistrationForm")->name('attorney.register');
Route::get('/attorney_login',"Auth\AttorneysLoginController@showLoginForm")->name('attorney.login');
Route::post('/attorneys',"Auth\AttorneysRegisterController@store")->name('attorneys.store');
Route::post('/attorney_login',"Auth\AttorneysLoginController@Login")->name('attorney.login.submit');
Route::get('/logout', 'Auth\AttorneysLoginController@logout')->name('attorney.logout');

Route::get('get-attorneys',"AttorneysController@getattorneys")->name('get.attorneys');

//reset password routes for attorneys
Route::prefix('attorney')->group(function(){
    Route::post('password/email','Auth\AttorneysForgotPasswordController@sendResetLinkEmail' )->name('attorney.password.email');    
    Route::get('password/reset','Auth\AttorneysForgotPasswordController@showLinkRequestForm')->name('attorney.password.request');
    Route::post('password/reset','Auth\AttorneysResetPasswordController@reset')->name('attorney.password.update');
    Route::get('password/reset/{token}','Auth\AttorneysResetPasswordController@showResetForm')->name('attorney.password.reset');
});


//messaging
Route::get('/message/{id}',"HomeController@getMessage")->name('message');
Route::post('message',"HomeController@sendMessage");

// attorney messaging routes
Route::get('/attorney-message/{id}',"AttorneyMessageController@getMessageForm")->name('attorney-message.form');
Route::post('/attorney-message',"AttorneyMessageController@store")->name('send.message');


//attorney review
Route::resource('reviews',"AttorneyReviewController");
Route::get('review/{id}/write-review',"AttorneyReviewController@create_form")->name('write.review');

// inbox attorney
Route::get('/updateInbox',"InboxController@updateInbox");


// user message routes
Route::post('/user-message',"UserMessageController@store")->name('user.send.message');

//inbox user
Route::get('/updateUserInbox',"InboxController@updateUserInbox");

//Delete User
Route::delete('/users/{user}',"HomeController@destroy")->name('user.delete');


