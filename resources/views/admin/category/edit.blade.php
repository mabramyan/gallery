@extends('layouts.app')

@section('title', '| Edit Role')

@section('content')


{{ Form::model($category, array('route' => array('admin.category.update', $category->id), 'method' => 'PUT', 'id'=>"registration-form")) }}

<div class="registration-form-title">კატეგორიის დამატება / რედაქტირება</div>
<hr>
<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', $category->title, array('class' => '')) }}
    @error('title')
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
