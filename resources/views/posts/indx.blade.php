@extends('layouts.app')
@section('content')
    <h1>posts</h1>
    @if (count($post) > 0)
        @foreach ($post as $posts)
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <a href="/post/{{ $posts->id }}"><h2>{{ $posts->title }}</h2></a>
                        <small>Created at : {{ $posts->created_at }} </small>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $post->links('pagination::bootstrap-5')}}
    @else
        <p>no posts available</p>
    @endif

@endsection

