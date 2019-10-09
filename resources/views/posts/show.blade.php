@extends('layouts.app')

@section('title', '| Create New Post')

@section('content')

<div class="display-image"><img src="/{{$post->image}}"></div>
<p style="text-align: center;">{{$post->name}}</p>
<p style="text-align: center;">{{ implode(", ",$post->categories->pluck('title')->toArray()) }}</p>
<div class="image-footer">
    <div class="left-side"><span class="user-profile-image-span"><img src="/images/profile_default2.png"></span><span
            class="user-image-username">{{ Auth::user()->name }}</span></div>
    <div class="right-side"><a class="thumb-up-anchor" href=""><i class="fa fa-thumbs-up thumb-up-icon"></i></a><a
            class="thumb-down-anchor" href=""><i class="fa fa-thumbs-down thumb-down-icon"></i></a><a
            class="download-image-button" href="image/download" download>Download Image</a></div>
</div>
<div class="container">
    <form method="POST" action="{{ route('comments.store') }}">
        @csrf
        <textarea class="comment-textarea" placeholder="Leave a Comment" name="body"></textarea>
        <input type="hidden" name="post_id" value="{{ $post->id }}" />

        <input class="comment-submit-button" type="submit" value="Comment">
    </form>
    <span class="comment-amount-span">{{$post->comments->count()}} Comments</span>

    @include('posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])


</div>

@endsection
