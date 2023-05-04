@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts Dashboard</div>

                    <div class="card-body">
                        <a href="/post/create" class="btn btn-primary btn-sm">Create post</a>
                        <h5 style="margin:20px 0;">Your Blog Posts</h5>
                        <hr>
                        @if (count($posts) > 0)
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->title }}</td>
                                            <td>
                                                <a href="/post/{{ $post->id }}/edit"
                                                    class="btn btn-outline-secondary">edit</a>
                                            </td>
                                            <td>

                                                {!! Form::open([
                                                    'action' => ['App\Http\Controllers\postController@destroy', $post->id],
                                                    'method' => 'post',
                                                    'class' => 'd-inline floate-right',
                                                ]) !!}


                                                {{ Form::hidden('_method', 'DELETE') }}

                                                <div class="form-group">
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger']) !!}
                                                </div>

                                                {!! Form::close() !!}

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No Posts Available</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- ------------------------------------------------------------------------------------------------------------------ --}}



        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Media Dashboard</div>

                    <div class="card-body">
                        <a href="/media/upload" class="btn btn-primary btn-sm">upload media</a>
                        <h5 style="margin:20px 0;">Your Media</h5>
                        <hr>
                        @if (count($media) > 0)
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Media</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($media as $photo)
                                        <tr>
                                            <td>
                                                <img src="/photos/{{ $photo->name }}" style="width:60px;height:60px">
                                            </td>
                                            <td>
                                                <a href="/media/{{ $photo->id }}"
                                                    class="btn btn-outline-secondary">show</a>
                                            </td>
                                            <td>
                                                {!! Form::open([
                                                    'action' => ['App\Http\Controllers\MediaController@destroy', $photo->id],
                                                    'method' => 'post',
                                                    'class' => 'd-inline floate-right',
                                                ]) !!}


                                                {{ Form::hidden('_method', 'DELETE') }}

                                                <div class="form-group">
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger']) !!}
                                                </div>

                                                {!! Form::close() !!}


                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No Posts Available</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
