@extends('layouts.master')

@section('content')

            
 <div class="container">
        <div class="row">
         @foreach ($posts as $post)
            <div class="span12">
                <h1>{{{ $post->post_title }}}</h1>
                <p>{{{ $post->post_body }}}</p>
                <img class="img-polaroid" src="{{ $post->post_image }}" width="300px" height="200px" alt=""><br><br>
                 <audio controls>
                <source src="{{{ $post->post_music }}}" type="audio/mpeg">  
                </audio><br>
              
                <span class="badge badge-success">Posted {{{$post->updated_at}}}</span><br><br>
                @if ( !Auth::guest() )
                <div class="span1">
                {{{ Form::open('admin/post/'.$post->id, 'Delete') }}}
                <a>{{{ Form::submit('Delete',array('class' => 'btn btn-danger')) }}}</a>
                {{{ Form::close() }}}
                </div>
                <div class="span1">
                <a class="btn btn-warning" href="{{ URL::action('PostController@edit', array($post->id)) }}">
                        <i class="icon-edit icon-white"></i> Edit
                </a>
                </div>
                <br>
                @endif

                <hr />
            </div>
         @endforeach
        </div>
    </div>
@stop