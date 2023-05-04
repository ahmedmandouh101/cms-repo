@extends('layouts.app')
@section('content')
    <h1>media</h1>
    <hr>
    @if (count($media) > 0)
    <div class="row">
        @foreach ($media as $photo)

            <div class="col-md-4 col-sm-6">
                <a href="/media/{{$photo->id}}">
                    <img src="/photos/{{ $photo->name }}" class="img-thumbnail"  style="width:100%;height:100%">
                </a>
            </div>

        @endforeach
    </div>
    {{ $media->links('pagination::bootstrap-5')}}
    @else
        <p>no media available</p>
    @endif

@endsection
