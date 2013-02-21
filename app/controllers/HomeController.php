<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showallPosts()
	{
		$posts = Post::with(array('user'))->get();
    	return View::make('home')->with('posts', $posts);
	}

	public function showownPosts()
	{
		$id = Auth::User()->id;
		
		$posts = Post::where('post_author','=',$id)->with(array('user'))->get();
    	return View::make('home')->with('posts', $posts);
	}
	



}