<?php

class PostController extends BaseController {


	 public function __construct()
     {
        $this->beforeFilter('auth');

     }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$id = Auth::User()->id;
		
		$posts = Post::where('post_author','=',$id)->with(array('user'))->get();
    	return View::make('admin.post.userhome')->with('posts', $posts);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.post.new');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
    	$validator = Validator::make(
			Input::all(),
    	 	array(
    	    	'post_title' => 'required|min:3|max:255',
    	    	'post_body'  => 'required|min:1'
    		)
    	);
    	 
    	if ($validator->fails())
    	{
    	    return Redirect::back()
    	            ->withInput()
    	            ->withErrors($validator);
    	}

		$new_post = array(
			'post_title'    => Input::get('post_title'),
			'post_body'     => Input::get('post_body'),
			'post_author'   => Auth::User()->id,
    	);
	
    	if (Input::hasFile('picture','jpg'))
		{
			$new_path = Input::file('picture')->move('upload');
		    // Add picture to new post array.
    	    $new_post['post_image']	= $new_path;
		}
		if (Input::hasFile('music','.mp3'))
		{
			$new_path2 = Input::file('music')->move('upload');
		    // Add picture to new post array.
    	     $new_post['post_music']= $new_path2;
		}
    	
    	$post = new Post($new_post);
    	$post->save();

    	return Redirect::to('admin/post');
    	
    	
	
	}

	/**
	 * Display the specified resource.
	 *
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);

		return View::make('admin.post.edit')->with('post', $post);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @return Response
	 */
	public function update($id)
	{
		$post = Post::find($id);

    	$post->post_title = Input::get('post_title');
    	$post->post_body = Input::get('post_body');
    	$post->post_author = Auth::User()->id;

    	if (Input::hasFile('picture','jpg'))
		{
			$new_path = Input::file('picture')->move('upload');
		    // Add picture to new post array.
    	    $post->post_image = $new_path;
		}
		if (Input::hasFile('music','.mp3'))
		{
			$new_path2 = Input::file('music')->move('upload');
		    // Add picture to new post array.
    	     $post->post_music = $new_path2;
		}

		$post->save();

		return Redirect::to('admin/post');



	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$delete_post = Post::with('user')->find($id);
    	$delete_post->delete();
    	return Redirect::to('admin/post');

	}

}