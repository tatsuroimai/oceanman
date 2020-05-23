@extends('layouts.app')

@section('content')
<div class="container">
  <div class="gallery">    
    @foreach($items as $item)     
        <div class="card mb-4">
          <a href="{{ route('post.show', ['post_id'=>$item->id]) }}" class="stretched-link"><img class="card-img-top" src="{{ $item->image }}" alt=""></a>
        </div>   
    @endforeach
  </div>
</div>  
@endsection