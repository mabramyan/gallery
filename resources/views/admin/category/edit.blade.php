@extends('layouts.app')

@section('title', '| Edit Role')

@section('content')

<div class='col-md-8'>
    <h1><i class='fa fa-key'></i> Edit Category: {{$category->title}}</h1>
    <hr>

    {{ Form::model($category, array('route' => array('admin.category.update', $category->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('title', 'Category Name') }}
        {{ Form::text('title', null, array('class' => 'form-control')) }}
    </div>


    <br>
    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
</div>

@endsection
