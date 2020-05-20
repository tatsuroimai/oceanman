@extends('layouts.app')

@section('content')
<div class="container">

  <div class="card" style="width: 20rem;">
    
      <img class="card-img-top" src="{{ asset('storage/post/' . $showpost->image) }}" alt="">
      <div class="card-body">
        <h4 class="card-title">{{ $showpost->title }}</h4>
        <p class="card-text">{{ $showpost->message }}</p>
        @if($showpost->user_id == Auth::id())
        <a href="{{ route('post.edit', ['post_id'=>$showpost->id]) }}" class="btn btn-primary stretched-link">編集</a>
        @endif
      </div>
  </div>

  <div class="card" style="width: 20rem;">
    <ul class="list-group list-group-flush">
      @foreach($showcomments as $comment)
        <li class="list-group-item">{{ $comment->comment }}</li>
      @endforeach
    </ul>
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