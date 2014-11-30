<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home');
});

Route::get('about', function()
{
  return View::make('about');
});

Route::get('contact', 'Pages@contact');




Route::get('register', array('as'=>'register','uses'=>'UserController@register'));
Route::post('register', array('as'=>'register','uses'=>'UserController@store'));
Route::get('login', 'UserController@getLogin');
Route::post('login', 'UserController@postSignin');
Route::get('logout', 'UserController@getLogout');

Route::group(array('prefix' => '', 'before' => 'auth'), function(){
	//redirect to login page

	Route::resource('users', 'UserController');

	Route::resource('membertypes', 'MembertypesController');

	Route::resource('types', 'TypesController');

	Route::get('status/dashboard', array('as'=>'status.dashboard','uses'=>'StatusController@dashboard'));
	Route::resource('status', 'StatusController');
	
	


	Route::get('businesses/add/{user_id}',  array('as'=>'businesses.add','uses'=>'BusinessesController@add'));
	Route::get('businesses/list/{user_id}',  array('as'=>'businesses.list','uses'=>'BusinessesController@b_list'));
	Route::post('businesses/store_user', array('as' => 'businesses.store_user','uses'=>'BusinessesController@store_user'));
	Route::resource('businesses', 'BusinessesController');
	Route::get('members_businesses/link/{data1}/{data2}', array('as'=>'members_businesses.link', 'uses'=>'MembersBusinessesController@link'));
	Route::get('members_businesses/unlink/{data1}/{data2}', array('as'=>'members_businesses.unlink', 'uses'=>'MembersBusinessesController@unlink'));
	Route::post('members_businesses/linked', array('as'=>'members_businesses.linked', 'uses'=>'MembersBusinessesController@linked'));
	Route::post('members_businesses/unlinked', array('as'=>'members_businesses.unlinked', 'uses'=>'MembersBusinessesController@unlinked'));
	Route::resource('members_businesses', 'MembersBusinessesController');

});


Route::get('password/remind', array(
  'uses' => 'RemindersController@getRemind',
  'as' => 'password.remind'
));

//Route::get('password/reset/{token}', 'RemindersController@getReset');


Route::post('password/remind', array(
  'uses' => 'RemindersController@postRemind',
  'as' => 'password.remind'
));


Route::get('password/reset/{token}', array(
  'uses' => 'RemindersController@getReset',
  'as' => 'password.reset'
));

Route::post('password/reset/{token}', array(
  'uses' => 'RemindersController@postReset',
  'as' => 'password.reset'
));

	App::missing(function($exception)
	{

		// shows an error page (app/views/error.blade.php)
		// returns a page not found error
		return Response::view('404', array(), 404);
	});