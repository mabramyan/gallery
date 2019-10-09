@extends('layouts.app')

@section('title', '| Users')

@section('content')
<main style="display: flex;justify-content: center; flex-direction: column; max-width: 700px;margin:0 auto;">
    <h3 style="text-align: center;">კატეგორიები</h3>
    <a style="width: 200px;margin: 10px 0;" href="{{ route('admin.category.create') }}" class="btn btn-primary">კატეგორიის დამატება</a>
    <table class="table">
        <thead>
            <tr>
                <th>კატეგორია</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->title }}</td>
                <td>
                    <div style="display:flex">
                        <a href="{{ route('admin.category.edit', $category->id) }}" style="margin-right: 3px;"><i
                                class="fa fa-edit"></i></a>

                        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.category.destroy', $category->id] ])
                        !!}
                        <a href=""><i class="fa fa-trash"></i></a>
                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection
