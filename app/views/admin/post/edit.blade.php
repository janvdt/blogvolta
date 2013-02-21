@extends('layouts.master')
@section('content')
<div class="span8">
    <h2>Edit your post post</h2>
    <hr />
    {{{ Form::openForFiles("admin/post/{$post->id}", 'PUT') }}}
        <!-- title field -->
        <p>{{{ Form::label('post_title', 'Post Title') }}}</p>
        
        <p>{{{ Form::text('post_title', Input::old('post_title', $post->post_title)) }}}</p>
        <!-- body field -->
        <p>{{{ Form::label('post_body', 'Post Body') }}}</p>
        
        <p>{{{ Form::textarea('post_body', Input::old('post_body', $post->post_body)) }}}</p>
        <!-- submit button -->
        <p>{{{ Form::label('post_image', 'Post Image') }}}</p>
        
        <p>{{{ Form::file('picture') }}}</p>

        <p>{{{ Form::label('post_image2', 'Post Image2') }}}</p>
        
        <p>{{{ Form::file('music') }}}</p>
        <p>{{{ Form::submit('Update') }}}</p>
    {{{ Form::close() }}}
</div>
@stop