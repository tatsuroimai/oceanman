@extends('layouts.app')

@section('content')
<div class="container">
  <div class="gallery">    
    @foreach($posts as $post)     
        <div class="card mb-4">
          <a href="{{ route('post.show', ['post_id'=>$post->id]) }}" class="stretched-link"><img class="card-img-top" src="{{ $post->image }}" alt=""></a>
        </div>   
    @endforeach
  </div>
</div>  
@endsection