<?php

Route::get('/', function () {
	if (Auth::user()) {
		return redirect()->route('home')->with('success','Welcome back ' . Auth::user()->name . ' to ' . config('app.name') . '!');
	}
    return redirect()->route('login')->with('info','Welcome to ' . config('app.name') . '! Please login to continue.');
});

Route::get('/web/questions', [
	'as' 	=> 'questions',
	'uses'	=> function(){
		return view('web.questions');
	}
]);
Route::get('/web/posts', [
	'as' 	=> 'posts',
	'uses'	=> function(){
		return view('web.posts');
	}
]);
Route::get('terms-and-conditions', [
	'as' 	=> 'terms',
	'uses'	=> function(){
		return view('web.terms');
	}
]);
Route::get('details', [
	'as' 	=> 'more.details',
	'uses'	=> function(){
		return view('web.more');
	}
]);

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', [
	'as' 	=> 'user.home',
	'uses'	=> 'HomeController@userIndex'
]);

Route::get('/home', 'HomeController@index')->name('home');

// other routes
// administrator routes

Route::group(['prefix' => 'admin', 'middleware' => ['auth','verified','role:super-admin|admin']], function(){
	Route::resource('/roles', 'RoleController');
	/*
	 * closure pages
	 */
	Route::get('/', [
		'as' 	=> 'admin',
		'uses'	=> 'AdminPageController@index',
	]);
});

Route::group(['prefix'	=> 'admin', 'middleware'	=> ['auth','verified']], function()
{
	Route::resource('/users', 'UserController');
});

Route::group(['prefix' => 'home', 'middleware' => ['auth','verified']], function(){
	Route::resource('company/posts', 'PostController');
	Route::resource('/officers', 'OfficerController');
	Route::resource('/companies', 'CompanyController');
	Route::resource('/company/questions', 'QuestionController');
	Route::resource('/cars/owners', 'CarOwnerController');
	Route::resource('/cars/owner/accounts', 'AccountController');
	Route::resource('/cars/vehicles', 'CarController');
	Route::resource('/cars/owners', 'CarOwnerController');
	Route::resource('/cars/owner/crimes', 'CrimeController');


	Route::get('/user/profile/settings', [
		'as' 	=> 'settings',
		'uses'	=> 'UserPageController@settings',
	]);
	Route::get('/user/profile', [
		'as' 	=> 'profile',
		'uses'	=> 'UserPageController@profile',
	]);
	Route::post('/user/profile', [
		'as'	=> 'profile.update',
		'uses'	=> 'UserPageController@update_image'
	]);
	Route::post('/user/password/profile', [
		'as'	=> 'password.update',
		'uses'	=> 'UserController@changePassword'
	]);
});