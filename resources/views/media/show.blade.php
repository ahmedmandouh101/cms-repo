@extends('layouts.app')
@section('content')
    <h1>Media preview</h1>
    <a href="/media" class="btn btn-secondary">Go Back</a>
    @if (Auth::user())
        @if(Auth::user()->id == $media->user->id)
            {!! Form::open([
                'action' => ['App\Http\Controllers\MediaController@destroy', $media->id],
                'method' => 'post',
                'class' => 'd-inline floate-right',
            ]) !!}
<br> <br>

            {{ Form::hidden('_method', 'DELETE') }}

            <div class="form-group">
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            </div>

            {!! Form::close() !!}
        @endif
    @endif
    <hr>

    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-sm-6-offset-4">
            <img src="/photos/{{ $media->name }}" style="width:100%;height:100%">
        </div>
    </div>
@endsection
