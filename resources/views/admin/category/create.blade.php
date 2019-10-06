
@extends('layouts.app')

@section('title', '| Add Role')

@section('content')

<div class='col-md-8'>

    <h1><i class='fa fa-key'></i> Add Category</h1>
    <hr>

    {{ Form::open(array('url' => 'admin/category')) }}

    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', null, array('class' => 'form-control')) }}
    </div>



    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection
