@extends('layouts.app')

@section('content')
<div class="container my-5">
  <div class="card mb-3" style="max-width: 1000px;">
    <div class="row no-gutters">
      <div class="col-md-5">
        <img class="card-img-top" src="{{ $showpost->image }}" alt="">
      </div>
      <div class="col-md-7">
        <div class="card-body">
          <div class="row mb-5">
            @if($showpost->user->thumbnail)
              <a href="{{ route('user.show', ['user_id'=>$showpost->user_id]) }}">
                <img class="showpostuser" src="{{ $showpost->user->thumbnail }}" style="width:50px; height:50px; position:absolute; top:20px; left:20px; border-radius:50%" alt=""> 
              </a>
            @else
              <a href="{{ route('user.show', ['user_id'=>$showpost->user_id]) }}">
                <img src="{{ asset('img/blank-profile-picture-973460_640.png') }}" style="width:50px; height:50px; position:absolute; top:20px; left:20px; border-radius:50%" alt="">
              </a>
            @endif
              <div style="position:relative; top:15px; left:90px">{{ $showpost->user->name }}</div>        
          </div>
          <h4 class="card-title">{{ $showpost->title }}</h4>
          <p class="card-text">{{ $showpost->message }}</p>
          <p　class="text-right">{{ 'トピック: ' . $showpost->topic->topic }}</p>
          @if($showpost->user_id == Auth::id())
          <a href="{{ route('post.edit', ['post_id'=>$showpost->id]) }}" class="btn btn-outline-secondary">編集</a>
          @endif
        </div>  
        <div>
          <div class="comment-group my-3 ml-3">
          @if($showcomments)
            @foreach($showcomments as $comment)
              <div class="row comment-item my-3" style="border-radius:50">
                @if($comment->user->thumbnail)
                  <a href="{{ route('user.show', ['user_id'=>$comment->user_id]) }}">
                    <img src="{{ $comment->user->thumbnail }}" style="width:40px; height:40px; border-radius:50%; position:relative; left:40px" alt="">
                  </a>
                @else
                  <a href="{{ route('user.show', ['user_id'=>$comment->user_id]) }}">
                    <img src="{{ asset('img/blank-profile-picture-973460_640.png') }}" style="width:40px; height:40px; border-radius:50%; position:relative; left:40px" alt="">
                  </a>
                @endif
                <div style="position:relative; top:10px; left:60px">{{ $comment->comment }}</div>
              </div>    
            @endforeach
          @endif
          </div>
        </div>  
      </div>

    </div>
  </div>

  <form method="POST" action="{{ route('comment.add', ['post_id'=>$showpost->id]) }}"　style="max-width: 1000px;">
    @csrf
    <div class="form-group">
      <label for="comment">コメント</label>
      <textarea class="form-control" name="comment" type="text" rows="1" required></textarea>
    </div>
    <div class="form-group">
      <!-- <div class="col-md-6 offset-md-4"> -->
        <button type="submit" class="btn btn-primary">コメント</button>
      <!-- </div> -->
    </div>
  </form>
  
</div>  
@endsection