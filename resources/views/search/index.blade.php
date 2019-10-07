@extends('layouts.app')

@section('title', '| Permissions')

@section('content')

<div class="col-md-8">
    <h1>Profile
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-4">
                    {{ Form::open(array('route' => 'search','enctype' => 'multipart/form-data')) }}

                    <div class="form-group" style="width: 600px;">
                        
                        {{ Form::label('name', 'სათაური') }}
                        {{ Form::text('name', null, array('class' => 'form-control')) }}
                        <br>
            
                        <br>
                        {{Form::label('categories', 'კატეგორია')}}
                        <br>
                        {{Form::select('categories',$categories,null,array('multiple'=>'multiple','class' => 'form-control','name'=>'categories[]'))}}
                        <br>
            
                        {{ Form::submit('გაფილტვრა', array('class' => 'btn btn-success btn-lg btn-block')) }}
                        {{ Form::close() }}
                    </div>
            </div>
        </div> 
        <div class="profile-images-div row">


            @foreach ($posts as $post)
            <div class="col-md-4 profile-image-div">
                <a class="image-anchor" href="{{ route('posts.show',$post->id)}}">
                    <img width="200px" class="profile-image" src="{{ $post->image}}">
                </a>
                <br>
                <a class="image-anchor" href="{{ route('posts.show',$post->id)}}">
                    {{$post->name}}
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
