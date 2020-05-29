@extends('layouts.app')
@section('title','ユーザー情報')
@section('content')
<div class="container">
  <div class="row my-4">
    <div class="col-md-4 mb-5">
    @if($showuser->thumbnail)
    <img src="{{ $showuser->thumbnail }}" class="thumbnail offset-5">
    @else
    <img src="{{ asset('img/blank-profile-picture-973460_640.png') }}" class="thumbnail offset-5" alt="">
    @endif    
    </div>
    <div class="col-md-7">
      <h2>{{ $showuser->name }}</h2>
    </div>

    
  </div>

  <div class="gallery">    
    @foreach($posts as $post)        
          <a href="{{ route('post.show', ['post_id'=>$post->id]) }}"><img class="card-img-top" src="{{ $post->image }}" alt=""></a>
    @endforeach
  </div>
  
</div>  
@endsection