@extends('layouts.app')
@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <hr>
    <small>Created at : {{ $post->created_at }}</small>
    <hr>
    @if (Auth::user())

            <a href="/post/{{ $post->id }}/edit" class="btn btn-outline-secondary">edit</a>
<br> <br>

            {!! Form::open([
                'action' => ['App\Http\Controllers\postController@destroy', $post->id],
                'method' => 'post',
                'class' => 'd-inline floate-right',
            ]) !!}


            {{ Form::hidden('_method', 'DELETE') }}

            <div class="form-group">
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            </div>

            {!! Form::close() !!}

    @endif
@endsection
