@extends('layouts.app')

@section('content')
<div class="container">

  @if($users == 'noneed')
  <div></div>
  @elseif(empty($users))
  <div class="mb-5">該当するユーザーはありませんでした。</div>
  @endif

  @if(!empty($users) && $users != 'noneed')
    <h2>該当したユーザー</h2>
    <div class="row my-4">
      @foreach($users as $user)
        <div class="col-md-4 mb-5">
          @if($user->thumbnail)
          <a href="{{ route('user.show', ['user_id'=>$user->id]) }}">
            <img src="{{ $user->thumbnail }}" class="thumbnail searchthumbnail offset-5" alt=""> 
          </a>
          @else
          <a href="{{ route('user.show', ['user_id'=>$user->id]) }}">
            <img src="{{ asset('img/blank-profile-picture-973460_640.png') }}" class="thumbnail searchthumbnail offset-5" alt="">
          </a>
          @endif
        </div>
        <div class="col-md-8">
          <h2>{{ $user->name }}</h2>
        </div>  
      @endforeach
    </div>
  @endif

  @empty($posts)
  <div>該当するポストはありませんでした。</div>
  @endempty

  @if($posts) 
  <!-- <h2>複数のポストが見つかりました！</h2> -->
  <div class="gallery">   
    @foreach($posts as $post)     
        <div class="card mb-4">
          <a href="{{ route('post.show', ['post_id'=>$post->id]) }}"><img class="card-img-top" src="{{ $post->image }}" alt=""></a>
        </div>  
    @endforeach
  </div>
  @endif
</div>  
@endsection