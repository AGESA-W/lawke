<?php

use App\Attorney;
use Illuminate\Support\Facades\Input;

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

Route::prefix('home')->group(function(){
  Route::get('/', 'HomeController@index')->name('home');
  Route::get('/reviews', 'HomeController@reviews')->name('user.reviews');
  Route::get('/questions', 'HomeController@questions')->name('user.questions');


});
Route::get('/users/logout', 'Auth\LoginController@UserLogout')->name('users.logout');//remember to give users


// Attorneys pages
Route::get('/profile/{id}',"AttorneysController@profile")->name('profile');

//about
Route::put('/attor/{id}',"AttorneysController@aboutAttorney")->name('about.attorney');


//Endorsment
Route::get('/attorney/{id}/endorsment',"EndorsmentController@endorsment")->name('attorney.endorsment');
Route::post('/endorsments',"EndorsmentController@store")->name('endorsment.store');
Route::put('/attorney_dashboard/test',"EndorsmentController@update")->name('endorsment.update');
Route::delete('/attorney_dashboard/{id}',"EndorsmentController@destroy")->name('endorsment.destroy');


Route::put('/attorneys/{id}',"AttorneysController@updateLocation")->name('location.update');
Route::post('/attorney_dashboard',"AttorneysController@addEducation")->name('add.education');
Route::put('/attorney_dashboard',"AttorneysController@updateEducation")->name('edit.education');

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

  //question
  Route::put('/question/{id}','AdminController@updateQuestion')->name('admin.question.update');
  Route::delete('/quest/{id}','AdminController@destroyQuestion')->name('admin.question.destroy');

  // answer
  Route::put('/answer/{id}','AdminController@updateAnswer')->name('admin.answer.update');
  Route::delete('/answ/{id}','AdminController@deleteAnswer')->name('admin.answer.destroy');



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
Route::get('/lawyers-name/{letter}', "PagesController@name")->name('name.attorney');

/********* END SLUG ROUTES */

/*******SEARCH ROUTES********/
Route::get('/search','SearchController@index')->name('search');
Route::get('/search/action','SearchController@action')->name('search.action');
Route::any('/se','SearchController@Search')->name('search.results');
Route::get('/rating','SearchController@rating');
//questions
Route::get('/get-advice','QuestionController@getadvice')->name('get.advice');
Route::get('/ask-lawyer','QuestionController@asklawyer')->name('ask.lawyer');
Route::post('/ask','QuestionController@clientQuestionStore')->name('client.question');
Route::get('/topics/{category}', "QuestionController@topic")->name('individual.topic');
Route::get('/legal-answers/{id}/{swali}', "QuestionController@answers")->name('question.answer');
Route::put('/question/{id}','QuestionController@updateQuestion')->name('question.update');



// answer
Route::get('/legal-answers/{id}/{question}/add-answer', "AnswerController@answer")->name('answer');
Route::post('/ask-lawyer','AnswerController@attorneyAnswerStore')->name('attorney.answer');
Route::put('/answer/{id}','AnswerController@updateAnswer')->name('answer.update');
Route::delete('/delete-answer/{id}','AnswerController@deleteAnswer')->name('answer.destroy');


// verify attorney account
Route::get('/verify-attorney/{token}','VerifyController@verify')->name('verify.attorney');

// verify email
Route::get('/email/verify-attorney','VerifyController@verifyEmail')->name('verify.email');

Route::post('/email/verify-attorney','VerifyController@resendEmail')->name('verification.resend.attorney');

/****contact pages****/
Route::get('/contact/support','ContactController@getSupport');
Route::post('/contact/support','ContactController@postSupport')->name('new.request');

//clients
Route::get('/support/clients/How-to-contact-legalmeet','ContactController@contactClient');
Route::get('/support/clients/How-do-I-search-for-lawyer','ContactController@search');
Route::get('/support/clients/Where-is-my-review','ContactController@review');
Route::get('/support/clients/How-do-I-view-and-send-message','ContactController@message');

//lawyers
Route::get('/support/lawyers/How-to-contact-legalmeet','ContactController@contact');
Route::get('/support/lawyers/How-do-I-reset-my-password','ContactController@resetPassword');
Route::get('/support/lawyers/How-does-legalmeet-get-information','ContactController@information');
Route::get('/support/lawyers/How-do-I-know-the-reviews-are-real','ContactController@reviewContacts');


Route::prefix('/attorney_dashboard')->group(function(){
  Route::get('/',"AttorneysController@dashboard")->name('attorney_dashboard')->middleware('verify');
  Route::get('/location','AttorneysController@location')->name('dashboard.location');
  Route::get('/education','AttorneysController@education')->name('dashboard.education');
  Route::get('/endorsments-done','AttorneysController@endorsmentDone')->name('dashboard.endorsmentDone');
  Route::get('/endorsments-received','AttorneysController@endorsmentReceived')->name('dashboard.endorsmentReceived');
  Route::get('/reviews','AttorneysController@review')->name('dashboard.review');
  Route::get('/questions-answered','AttorneysController@questionsAnswered')->name('dashboard.questionsAnswered');




  


});

//new messaging
Route::prefix('/attorney_dashboard/messenger')->group(function(){
  Route::get('/',"UserMessagesController@index")->name('message.index');
  Route::get('/create',"UserMessagesController@createMessage")->name('user.message.form');
  Route::post('/create',"UserMessagesController@storeMessage")->name('user.message.send');
  Route::get('/inbox',"UserMessagesController@showInbox")->name('message.inbox');
  Route::delete('/inbox/{id}',"UserMessagesController@destroy")->name('message.delete');
  Route::get('/inbox/{id}',"UserMessagesController@showMessage")->name('message.show');
  Route::get('/reply/{id}',"UserMessagesController@replyMessage")->name('message.reply');
  Route::post('/reply',"UserMessagesController@storeReply")->name('message.reply.send');
  Route::get('/outbox',"UserMessagesController@showOutbox")->name('message.outbox');
  Route::get('/outbox/{id}',"UserMessagesController@showOutboxMessage")->name('message.show.outbox');

});

//update lawyer inbox
Route::get('/updateLawyerInbox',"UpdateInboxController@updateLawyerInbox");


//new messaging for user
Route::prefix('/home/messenger')->group(function(){
  Route::get('/',"AttorneyMessagesController@index")->name('usermessage.index');
  Route::get('/create',"AttorneyMessagesController@createMessage")->name('attorney.message.form');
  Route::post('/h',"AttorneyMessagesController@storeUserMessage")->name('attorney.message.send');
  Route::get('/inbox',"AttorneyMessagesController@showUserInbox")->name('usermessage.inbox');
  Route::delete('/inbox/{id}',"AttorneyMessagesController@destroy")->name('usermessage.delete');
  Route::get('/inbox/{id}',"AttorneyMessagesController@showMessage")->name('usermessage.show');
  Route::get('/reply/{id}',"AttorneyMessagesController@replyMessage")->name('usermessage.reply');
  Route::post('/reply',"AttorneyMessagesController@storeReply")->name('usermessage.reply.send');
  Route::get('/outbox',"AttorneyMessagesController@showOutbox")->name('usermessage.outbox');
  Route::get('/outbox/{id}',"AttorneyMessagesController@showOutboxMessage")->name('usermessage.show.outbox');

  //search lawyer email
  Route::post('/create/fetch',"SearchController@fetch")->name('autocomplete.fetch');

});
// User sends message from the lawyers profile
Route::post('/sear',"AttorneyMessagesController@storeMessageProfile")->name('attorney.message.send.profile');

//update user inbox
Route::get('/updateUserInbox',"UpdateInboxController@updateUserInbox");
