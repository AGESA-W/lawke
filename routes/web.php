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
Route::get('/about','PagesController@about')->name('pages.about');
Route::get('/contact','PagesController@contact')->name('pages.contact');
Route::get('/for-lawyers','PagesController@forLawyers')->name('for-lawyers');

/*********End Main Pages**********/

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@UserLogout')->name('users.logout');//remember to give users


// Attorneys pages
Route::get('/profile/{id}',"AttorneysController@profile")->name('profile');
Route::get('/attorney_dashboard',"AttorneysController@dashboard")->name('attorney_dashboard')->middleware('verify');

//about
Route::put('/attor/{id}',"AttorneysController@aboutAttorney")->name('about.attorney');


//Endorsment
Route::get('/attorney/{id}/endorsment',"EndorsmentController@endorsment")->name('attorney.endorsment');
Route::post('/endorsments',"EndorsmentController@store")->name('endorsment.store');
Route::put('/attorney_dashboard/test',"EndorsmentController@update")->name('endorsment.update');
Route::delete('/attorney_dashboard/{id}',"EndorsmentController@destroy")->name('endorsment.destroy');


Route::put('/attorneys/{id}',"AttorneysController@updateLocation")->name('location.update');
Route::post('/attorney_dashboard',"AttorneysController@addEducation")->name('add.education');
Route::put('/attorney_dashboard/{attorney_dashboard}',"AttorneysController@updateEducation")->name('edit.education');

Route::get('/attorney_register',"Auth\AttorneysRegisterController@showRegistrationForm")->name('attorney.register');
Route::get('/attorney_login',"Auth\AttorneysLoginController@showLoginForm")->name('attorney.login');
Route::post('/attorneys',"Auth\AttorneysRegisterController@store")->name('attorneys.store');
Route::post('/attorney_login',"Auth\AttorneysLoginController@Login")->name('attorney.login.submit');
Route::get('/logout', 'Auth\AttorneysLoginController@logout')->name('attorney.logout');//remember to give attorneys
Route::get('get-attorneys',"AttorneysController@getattorneys")->name('get.attorneys');

//reset password routes for attorneys
Route::prefix('attorney')->group(function(){
    Route::post('password/email','Auth\AttorneysForgotPasswordController@sendResetLinkEmail' )->name('attorney.password.email');    
    Route::get('password/reset','Auth\AttorneysForgotPasswordController@showLinkRequestForm')->name('attorney.password.request');
    Route::post('password/reset','Auth\AttorneysResetPasswordController@reset')->name('attorney.password.update');
    Route::get('password/reset/{token}','Auth\AttorneysResetPasswordController@showResetForm')->name('attorney.password.reset');
});

// Admins pages
Route::prefix('admin')->group(function(){
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/login',"Auth\AdminLoginController@showLoginForm")->name('admin.login');
  Route::post('/login',"Auth\AdminLoginController@Login")->name('admin.login.submit');
  Route::get('/logout', 'Auth\AdminLoginController@Adminlogout')->name('admin.logout');

  //reports
  Route::get('/reports/create', 'AdminController@ratingreport')->name('rating.report');
  Route::get('/reports/create/lawyers', 'AdminController@lawyerRegReport')->name('lawyerReg.report');
  Route::get('/reports/create/users', 'AdminController@userRegReport')->name('userReg.report');
  Route::get('/reports/create/pdf', 'AdminController@pdf')->name('rating.pdf');

  //users
  Route::get('/users', 'AdminController@usersData')->name('users.table');
  Route::put('/users/{id}', 'AdminController@update')->name('users.update');
  Route::get('/users/details/{id}', 'AdminController@userdetails')->name('users.details');
  Route::delete('/users/{user}',"AdminController@userDestroy")->name('admin.user.delete');

  // reviews
  Route::put('/users/details/{id}','AdminController@updateReview')->name('admin.reviews.update');
  Route::delete('/users/details/{id}','AdminController@destroyReview')->name('admin.reviews.destroy');


  /*********attorneys*******/
  //account
  Route::get('/attorneys/account', 'AdminController@attorneysaccount')->name('attorneys.account');
  Route::put('/attorneys/account/{id}', 'AdminController@updateaccount')->name('update.lawyer.account');
  Route::get('/attorneys/details/{id}', 'AdminController@attorneydetails')->name('attorney.details');
  //Delete Education
  Route::delete('/attorneys/details/{id}',"AdminController@educationDestroy")->name('education.delete');

  //Work
  Route::get('/attorneys/work', 'AdminController@attorneyswork')->name('attorneys.work');
  Route::put('/attorneys/work/{id}', 'AdminController@updatework')->name('update.laywer.work');
  
  //education
  Route::get('/attorneys/education', 'AdminController@attorneyseducation')->name('attorneys.education');
  Route::put('/attorneys/education/{id}', 'AdminController@updateeducation')->name('update.lawyer.education');
  Route::post('/attorneys/details',"AdminController@addEducation")->name('add.lawyerEducation');

  Route::get('/attorneys/location', 'AdminController@attorneyslocation')->name('attorneys.location');

  // Endorsment
  Route::put('/attorneys/details/{id}',"AdminController@endorsmentUpdate")->name('admin.endorsment.update');
  Route::delete('/attorneys/endorsment/{id}',"AdminController@endorsmentDestroy")->name('admin.endorsment.destroy');


    
  //Reset passwords for admins
  Route::post('password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail' )->name('admin.password.email');    
  Route::get('password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('password/reset','Auth\AdminResetPasswordController@reset')->name('admin.password.update');
  Route::get('password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
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

/**********SOCIALITE */
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');


/*********SLUG ROUTES */
Route::get('/practice-areas/{praticearea}', "PagesController@areas")->name('practice.area');

Route::get('/practice-areas/{praticearea}/{county}', "PagesController@county")->name('practice.county');

Route::get('/all-lawyers/{county}', "PagesController@AllLocations")->name('location.practicearea');
/********* END SLUG ROUTES */

/*******SEARCH ROUTES********/
Route::get('/search','SearchController@index')->name('search');
Route::get('/search/action','SearchController@action')->name('search.action');

//questions
Route::get('/get-advice','QuestionController@getadvice')->name('get.advice');
Route::get('/ask-lawyer','QuestionController@asklawyer')->name('ask.lawyer');
Route::post('/ask','QuestionController@clientQuestionStore')->name('client.question');
Route::get('/topics/{category}', "QuestionController@topic")->name('individual.topic');
Route::get('/legal-answers/{question}', "QuestionController@answers")->name('question.answer');
Route::put('/question/{id}','QuestionController@updateQuestion')->name('question.update');



// answer
Route::get('/legal-answers/{question}/add-answer', "AnswerController@answer")->name('answer');
Route::post('/ask-lawyer','AnswerController@attorneyAnswerStore')->name('attorney.answer');
Route::put('/answer/{id}','AnswerController@updateAnswer')->name('answer.update');
Route::delete('/delete-answer/{id}','AnswerController@deleteAnswer')->name('answer.destroy');


Route::get('/markAsRead',function(){
  auth()->user()->unreadNotifications->markAsRead();
});

// verify attorney account
Route::get('/verify-attorney/{token}','VerifyController@verify')->name('verify.attorney');

// verify email
Route::get('/email/verify-attorney','VerifyController@verifyEmail')->name('verify.email');

Route::post('/email/verify-attorney','VerifyController@resendEmail')->name('verification.resend.attorney');

//contact pages
Route::get('/support/lawyers/How-to-contact-legalmeet','ContactController@contact');

//clients
Route::get('/support/clients/How-to-contact-legalmeet','ContactController@contactClient');
Route::get('/support/clients/How-do-I-search-for-lawyer','ContactController@search');
Route::get('/support/clients/Where-is-my-review','ContactController@review');
Route::get('/support/clients/How-do-I-view-and-send-message','ContactController@message');
