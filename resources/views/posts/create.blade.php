@extends('layouts.app')

@section('title', '| Create New Post')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">

        <h1>Create New Post</h1>
        <hr>

        {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::open(array('route' => 'posts.store','enctype' => 'multipart/form-data')) }}

        <div class="form-group" style="width: 600px;">
            {{ Form::label('image', 'სურათი') }}
            <br />
            {!! Form::file('image') !!}
            <br />
            <br />
            {{ Form::label('name', 'სათაური') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
            <br>

            <br>
            {{Form::label('categories', 'კატეგორია')}}
            <br>
            {{Form::select('categories',$categories,null,array('multiple'=>'multiple','class' => 'form-control','name'=>'categories[]'))}}
            <br>

            {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block')) }}
            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection
