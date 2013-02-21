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


Route::get('/', 'HomeController@showallPosts');


Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{

	Route::resource('post', 'PostController');

});


Route::get('login', 'LoginController@showLoginform');
 

Route::post('login', function() {
 
    $userinfo = array(
        'email' => Input::get('username'),
        'password' => Input::get('password')
    );
    if ( Auth::attempt($userinfo) )
    {
    	Session::put('user', Auth::user());
        return Redirect::to('admin/post');
    }
    else
    {
        return Redirect::to('login')
            ->with('loginerrors', true);
    }
});
 

Route::get('logout', function() {
    Auth::logout();
    return Redirect::to('/');
});
 
