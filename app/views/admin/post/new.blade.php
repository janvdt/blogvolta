@extends('layouts.master')
@section('content')
<div class="span8">
    <h2>Creating new post</h2>
    <hr />
    {{{ Form::openForFiles('admin/post', 'POST') }}}
        <!-- title field -->
        <p>{{{ Form::label('post_title', 'Post Title') }}}</p>
        {{{ $errors->first('post_title') }}}
        <p>{{{ Form::text('post_title', Input::old('post_title')) }}}</p>
        <!-- body field -->
        <p>{{{ Form::label('post_body', 'Post Body') }}}</p>
        
        <p>{{{ Form::textarea('post_body', Input::old('post_body')) }}}</p>
        <!-- submit button -->
        <p>{{{ Form::label('post_image', 'Post Image') }}}</p>
        
        <p>{{{ Form::file('picture') }}}</p>
        <p>{{{ Form::label('post_image2', 'Post Image2') }}}</p>
        
        <p>{{{ Form::file('music') }}}</p>
        <p>{{{ Form::submit('Create',array('class' => 'btn btn-primary')) }}}</p>
    {{{ Form::close() }}}
</div>
@stop
