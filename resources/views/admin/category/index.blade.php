@extends('layouts.app')

@section('title', '| Users')

@section('content')

<div class="col-md-8">
    <h1>
        Categories Administration
    </h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>
                        <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-info pull-left"
                            style="margin-right: 3px;">Edit</a>

                        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.category.destroy', $category->id] ])
                        !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <a href="{{ route('admin.category.create') }}" class="btn btn-success">Add Category</a>

</div>

@endsection
