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

//Route::resource('certificate', 'CertificateController');
Route::get('/admin/certificate', 'CertificateController@index')->name('certificate.index');
Route::get('/admin/certificate/create', 'CertificateController@create')->name('certificate.create');
Route::post('/admin/certificate', 'CertificateController@store')->name('certificate.store');
Route::get('/admin/certificate/{id}', 'CertificateController@show')->name('certificate.show');
Route::get('/admin/certificate/{id}/edit', 'CertificateController@edit')->name('certificate.edit');
Route::put('/admin/certificate/{id}', 'CertificateController@update')->name('certificate.update');
Route::delete('/admin/certificate/{id}', 'CertificateController@destroy')->name('certificate.destroy');


//Route::resource('correction', 'CorrectionController');
Route::get('/admin/correction', 'CorrectionController@index')->name('correction.index');
Route::get('/admin/correction/{id}', 'CorrectionController@show')->name('correction.show');
Route::delete('/admin/correction/{id}', 'CorrectionController@destroy')->name('correction.destroy');
Route::post('/admin/correction/{id}/approved', 'CorrectionController@approved')->name('correction.approved');
// Route::get('/admin/correction/create', 'CorrectionController@create')->name('correction.create');
// Route::post('/admin/correction', 'CorrectionController@store')->name('correction.store');
// Route::get('/admin/correction/{id}/edit', 'CorrectionController@edit')->name('correction.edit');
// Route::put('/admin/correction/{id}', 'CorrectionController@update')->name('correction.update');

Route::get('/correction_apply', 'CorrectionController@view')->name('correction.view');
Route::post('/correction_apply', 'CorrectionController@apply')->name('correction.apply');

//Route::resource('vote', 'VoteController');
Route::get('/vote', 'VoteController@voteList')->name('vote.list')->middleware('auth:web');
Route::post('/vote', 'VoteController@votePlace')->name('vote.place')->middleware('auth:web');


Route::resource('candidate', 'CandidateController');
Route::get('/candidate_apply', 'CandidateController@apply')->name('user.apply')->middleware('auth:web');

Route::get('/home', 'HomeController@index')->name('user');
Route::get('/', 'PagesController@index')->name('home');
Route::get('/history', 'PagesController@history')->name('history');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/how', 'PagesController@how')->name('how');
Route::get('/results', 'PagesController@results')->name('results');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::prefix('political_party')->group(function(){
    Route::get('/login', 'Auth\SubAdminLoginController@showLoginForm')->name('political_party.login');
    Route::post('/login', 'Auth\SubAdminLoginController@login')->name('political_party.login.submit');
    Route::get('/', 'SubAdminController@index')->name('political_party.dashboard');
    Route::get('/logout', 'Auth\SubAdminLoginController@logout')->name('political_party.logout');
});

Route::get('/address', 'AjaxController@division')->name('division');

Route::get('/district', 'AjaxController@district')->name('division_to_district');

Route::get('/upazila', 'AjaxController@upazilla')->name('district_to_upazilla');

Route::get('/rmo', 'AjaxController@union')->name('division_district_upazilla_rmo_to_union');


Route::get('/admin/election', 'ElectionController@index')->name('election.index');
Route::get('/admin/election/create', 'ElectionController@create')->name('election.create');
Route::post('/admin/election', 'ElectionController@store')->name('election.store');
Route::get('/admin/election/show/{id}', 'ElectionController@show')->name('election.show');


Route::get('/election_type_to_position', 'AjaxController@election_type_to_position')->name('election_type_to_position');
Route::get('/election_to_position', 'AjaxController@election_to_position')->name('election_to_position');
Route::get('/city_to_ward', 'AjaxController@city_to_ward')->name('city_to_ward');
Route::get('/election_type_position_to_zone', 'AjaxController@election_type_position_to_zone')->name('election_type_position_to_zone');

Route::get('/union_to_constituencies', 'AjaxController@union_to_constituencies')->name('union_to_constituencies');

Route::get('/election_type_position_to_user_election_area', 'AjaxController@election_type_position_to_user_election_area')
        ->name('election_type_position_to_user_election_area')
        ->middleware('auth:web');

Route::get('/election_detail_position_to_user_election_area', 'AjaxController@election_detail_position_to_user_election_area')
        ->name('election_detail_position_to_user_election_area')
        ->middleware('auth:web');


