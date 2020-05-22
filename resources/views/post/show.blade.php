@extends('layouts.app')

@section('content')
<div class="container">

  <!-- <div class="card" style="width: 20rem;">
    
      <img class="card-img-top" src="{{ asset('storage/post/' . $showpost->image) }}" alt="">
      <div class="card-body">
        <h4 class="card-title">{{ $showpost->title }}</h4>
        <p class="card-text">{{ $showpost->message }}</p>
        @if($showpost->user_id == Auth::id())
        <a href="{{ route('post.edit', ['post_id'=>$showpost->id]) }}" class="btn btn-primary stretched-link">編集</a>
        @endif
      </div>
  </div> -->

  <div class="card mb-3" style="max-width: 1000px;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img class="card-img-top" src="{{ asset('storage/post/' . $showpost->image) }}" alt="">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <div class="row mb-5">
            <a href="{{ route('user.show', ['user_id'=>$showpost->user_id]) }}">
              <img src="{{ asset('storage/user/' . $postuser->thumbnail) }}" style="width:50px; height:50px; position:absolute; top:5px; left:10px; border-radius:50%" alt=""> 
            </a>
            <div style="position:relative; left:100px">{{ $postuser->name }}</div>        
          </div>
          <h4 class="card-title">{{ $showpost->title }}</h4>
          <p class="card-text">{{ $showpost->message }}</p>
          @if($showpost->user_id == Auth::id())
          <a href="{{ route('post.edit', ['post_id'=>$showpost->id]) }}" class="btn btn-primary">編集</a>
          @endif
        </div>  
        <div style="width: 20rem;">
          <ul class="list-group list-group-flush">
            @foreach($showcomments as $comment)
              <li class="list-group-item">{{ $comment->comment }}</li>
            @endforeach
          </ul>
        </div>  
      </div>

    </div>
  </div>

  <form method="POST" action="{{ route('comment.add', ['post_id'=>$showpost->id]) }}">
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