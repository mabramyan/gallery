@extends('layouts.app')

@section('title', '| Create New Post')

@section('content')
{{ Form::open(array('route' => 'posts.store','enctype' => 'multipart/form-data','id'=>"registration-form")) }}

<div class="registration-form-title">რესურსის დამატება / რედაქტირება</div>
<hr>

<div class="form-group">
    {{ Form::label('image', 'სურათი') }}
    {!! Form::file('image') !!}
    @error('image')
    <span class="left-error" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    {{ Form::label('name', 'სათაური') }}
    {{ Form::text('name', null, array('class' => '')) }}
    @error('name')
    <span class="left-error" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    {{Form::label('categories', 'კატეგორია')}}
    {{Form::select('categories',$categories,null,array('multiple'=>'multiple','class' => '','name'=>'categories[]'))}}
    @error('categories')
    <span class="left-error" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <span class="error-message"></span>
    <input class="submit-btn" type="submit" value="დამატება">
</div>
{{ Form::close() }}


@endsection
