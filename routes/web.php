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

Auth::routes();

Route::resource('certificate', 'CertificateController');

Route::resource('correction', 'CorrectionController');
Route::get('/correction/{correction}/view', 'CorrectionController@view')->name('user.view');

Route::resource('vote', 'VoteController');

Route::resource('candidate', 'CandidateController');

Route::get('/home', 'HomeController@index')->name('user');
Route::get('/', 'PagesController@index')->name('home');
Route::get('/history', 'PagesController@history')->name('history');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/how', 'PagesController@how')->name('how');
Route::get('/results', 'PagesController@results')->name('results');
Route::get('/candidates', 'PagesController@candidates')->name('candidates');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::prefix('subAdmin')->group(function(){
    Route::get('/login', 'Auth\SubAdminLoginController@showLoginForm')->name('subAdmin.login');
    Route::post('/login', 'Auth\SubAdminLoginController@login')->name('subAdmin.login.submit');
    Route::get('/', 'SubAdminController@index')->name('subAdmin.dashboard');
    Route::get('/logout', 'Auth\SubAdminLoginController@logout')->name('subAdmin.logout');
});
