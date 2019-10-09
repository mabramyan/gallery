@extends('layouts.app')

@section('title', '| Add Role')

@section('content')



{{ Form::open(array('url' => 'admin/category', 'id'=>"registration-form")) }}
<div class="registration-form-title">კატეგორიის დამატება / რედაქტირება</div>
<hr>
<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, array('class' => '')) }}
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
