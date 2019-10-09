@foreach($comments as $comment)

        {{-- <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="body" class="form-control" />
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form> --}}



    <div class="user-comment-div">
            <div class="user-comment-image-div"><img class="user-comment-image" src="/images/profile_default2.png"></div>
            <div class="user-comment-right-div">
              <a href="" class="user-comment-username">{{ $comment->user->name }}</a>
              <span class="user-comment-time">{{ $comment->created_at }}</span>
              <div class="user-comment">{{ $comment->body }}</div>
            </div>
          </div>
@include('posts.commentsDisplay', ['comments' => $comment->replies])
@endforeach
