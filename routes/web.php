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

//User routes
//Main landing page
Route::get('/', 'Web\Landing\HomeController@landing')->name('landing');

// set cookie language
Route::get('/set-language/{lang}', 'Web\Landing\HomeController@setLanguage')->name('set.language')->where('lang', 'ar');

// Routes with lang prefix
Route::group([
    'prefix' => '{lang}',
    'where' => ['lang' => 'ar'],
    'middleware' => 'lang'
], function() {
    // Landing page in lang
    Route::get('/', 'Web\Landing\HomeController@index')->name('home');

    // About pages
    Route::get('/about', function(){
      return view('web.about.index');
    })->name('about');

    // News page
    Route::get('/news', 'Web\News\NewsController@index')->name('news');
    // Articles page
    Route::get('/articles', 'Web\Articles\ArticlesController@index')->name('articles');
    //video page
    Route::get('/videos', 'Web\video\VideoController@index')->name('videos');
    //audio page
    Route::get('/audios', 'Web\audio\AudioController@index')->name('audios');

    // New page
    Route::get('/new/{permalink}', 'Web\News\NewsController@new')->name('new');
    // article page
    Route::get('/article/{permalink}', 'Web\Articles\ArticlesController@article')->name('article');
    //video page
    Route::get('/video/{permalink}', 'Web\video\VideoController@video')->name('video');
    //audio page
    Route::get('/audio/{permalink}', 'Web\audio\AudioController@audio')->name('audio');

    // Contact page
    Route::get('/contact', 'Web\Contacts\ContactsController@index')->name('contact');
    Route::post('/send', 'Web\Contact\ContactController@submit')->name('send');
});

//Admin routes
Route::prefix('admin-panel')->group(function () {
  //Auth routes
  Route::get('/', 'Auth\LoginController@showLoginForm')->name('home.login');
  Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
  Route::post('login', 'Auth\LoginController@login');
  Route::post('logout', 'Auth\LoginController@logout')->name('logout');

  // Password Reset Routes...
  Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
  Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
  Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
  Route::post('password/reset', 'Auth\ResetPasswordController@reset');


  Route::middleware('auth')->group(function () {
    //Dashboard
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
    Route::get('/', 'Admin\DashboardController@index')->name('admin.home');

    //Admins
    Route::resource('/admins', 'Admin\AdminsController', ['except' => ['show']]);

    //Categories
    Route::resource('/categories', 'Admin\CategoriesController', ['except' => ['show']]);

    //Banners
    Route::resource('/banners', 'Admin\BannersController', ['except' => ['show']]);

    //News
    Route::resource('/news', 'Admin\NewsController', ['except' => ['show']]);
    //Articles
    Route::resource('/articles', 'Admin\ArticlesController', ['except' => ['show']]);
    //video
    Route::resource('/video', 'Admin\VideoController', ['except' => ['show']]);
    //audio
    Route::resource('/audio', 'Admin\AudioController', ['except' => ['show']]);

    //Settings
    Route::get('/setting', 'Admin\SettingController@index')->name('setting.index');
    Route::put('/setting', 'Admin\SettingController@update')->name('setting.update');

    //Mails
    Route::resource('{status}/mails', 'Admin\MailsController', ['except' => ['create', 'edit', 'update', 'store']]);
    Route::post('/mails/{mail_id}/reply', 'Admin\MailsController@reply')->name('mails.reply');

    // Profile page
    Route::get('/profile', 'Admin\ProfileController@get')->name('admin.get.profile');
    Route::post('/profile', 'Admin\ProfileController@save')->name('admin.profile.save');
  });
});
