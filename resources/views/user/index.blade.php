@extends('layouts.app')
@section('title','ユーザー情報')
@section('content')
<div class="container">
  <div class="row my-4">
    <div class="col-md-4 mb-5">
    @if($authUser->thumbnail)
    <img src="{{ $authUser->thumbnail }}" class="thumbnail thumbprofile offset-5">
    @else
    <img src="{{ asset('img/blank-profile-picture-973460_640.png') }}" class="thumbnail thumbprofile offset-5" alt="">
    @endif    
    </div>
    <div class="col-md-8">
      <h2>{{ $authUser->name }}</h2>

      <a href="{{ route('post.add' )}}" class="btn btn-primary btn-sm">投稿する</a>
      
      <a href="{{ route('user.edit') }}" class="btn btn-primary btn-sm">プロフィール編集</a>

    </div>

    
  </div>

  <div class="gallery">    
    @foreach($posts as $post)        
          <a href="{{ route('post.show', ['post_id'=>$post->id]) }}"><img class="card-img-top" src="{{ $post->image }}" alt=""></a>
    @endforeach
  </div>
  
</div>  
@endsection