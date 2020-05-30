@extends('layouts.app')

@section('content')
<div class="container">
  <!-- @if(empty($users) && empty($posts))
  <h2>該当するポスト、またはユーザーは見つかりませんでしたZE!!!。</h2>
  @endif -->

  @if($users == 'noneed')
  <div></div>
  @elseif(empty($users))
  <div>該当するユーザーはありませんでした。</div>
  @endif

  @if(!empty($users) && $users != 'noneed')
    <h2>該当したユーザー</h2>
    <div class="row my-4">
      @foreach($users as $user)
        <div class="col-md-4 mb-5">
          <img src="{{ $user->thumbnail }}" class="thumbnail searchthumbnail offset-5" alt=""> 
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