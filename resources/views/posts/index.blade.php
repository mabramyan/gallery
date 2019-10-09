@extends('layouts.app')

@section('title', '| Permissions')

@section('content')
<div class="profile-content-div">
    <div class="profile-content-div-header">
        <div class="profile-image-div">
            <img style="width: 100%;" src="images/profile_default.png">
        </div>
        <div class="centered">
            <span class="user-name">Username</span>
            <form id="profile-picture-form" enctype="multipart/form-data" method="POST" action="profile.html">
                <input type="file" id="profile-picture-input" class="hidden" name="profile_picture">
                <label for="profile-picture-input" class="profile-picture-input-label">Change Profile Picture</label>
            </form>
        </div>
    </div>
</div>


<h2 style="text-align: center;">ჩემს მიერ ატვირთული სურათები</h2>
<div class='profile-images-div'>
    @foreach ($posts as $post)
    <div class='profile-image-div'>
        <a class='image-anchor' href='{{ route('posts.show',$post->id)}}'><img class='profile-image'
                src='{{ $post->image}}'></a>
        <a class="edit" href="{{ route('posts.edit',$post->id)}}"><i class="fa fa-edit"></i></a>
        <span style="    position: absolute;

       ">
            {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id] ,'class'=>'image-anchor']) !!}
            {!! Form::submit('x', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}

        </span>

        </span>
    </div>
    @endforeach
</div>


@endsection
