@extends('layouts.app')

@section('title', '| Permissions')

@section('content')

<div class="col-md-8">
    <h1>Profile
        <hr>
        <div class="profile-images-div row">


            @foreach ($posts as $post)
            <div class="col-md-4 profile-image-div">
                <a class="image-anchor" href="{{ route('posts.show',$post->id)}}">
                    <img width="200px" class="profile-image" src="{{ $post->image}}">
                </a>
                <br>
                <div class="btn-group">
                <a class="btn btn-success" href="{{ route('posts.edit',$post->id)}}">
                    <i class="fa fa-edit"></i>
                </a>
                {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id] ]) !!}
                    {!! Form::submit('x', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            @endforeach

        </div>
        <a href="{{ route('posts.create') }}" class="btn btn-success">Add Post</a>

</div>

@endsection
