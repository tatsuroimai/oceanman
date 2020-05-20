@extends('layouts.app')
@section('title','ユーザー情報')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-4 mb-5">
    @if(!empty($authUser->thumbnail))
    <img src="{{ asset('storage/user/' . $authUser->thumbnail) }}" class="thumbnail offset-5">
    @else
    画像なし
    @endif    
    </div>
    <div class="col-md-7">
      <h2>{{ $authUser->name }}</h2>

      <a href="{{ route('post.add' )}}" class="btn btn-primary btn-sm">投稿する</a>
      
      <a href="{{ route('user.userEdit') }}" class="btn btn-primary btn-sm">プロフィール編集</a>

    </div>

    
  </div>

  <div class="card" style="width: 20rem;">
    @foreach($items as $item)
      <img class="card-img-top" src="{{ asset('storage/post/' . $item->image) }}" alt="">
      <div class="card-body">
        <h4 class="card-title">{{ $item->title }}</h4>
        <p class="card-text">{{ $item->message }}</p>
        <a href="#" class="btn btn-primary stretched-link">詳細を見る</a>
      </div>
    @endforeach
  </div>
  
</div>  
@endsection