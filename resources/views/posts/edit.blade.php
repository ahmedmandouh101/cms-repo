@extends('layouts.app')
@section('content')
    <h1>edit post</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\postController@update' ,$post->id ] , 'method' => 'post']) !!}

    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', $post->title, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('body', 'Body') }}
        {{ Form::textarea('body', $post->body, ['class' => 'form-control', 'rows'=>'5']) }}
    </div>
    {{ Form::hidden('_method' , 'PUT') }}
    <br> 
    <div class="form-group">
        {!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection
