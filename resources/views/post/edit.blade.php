@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="max-width: 1000px;">
        <div class="row no-gutters">
            <div class="col-md-5">
                <img class="card-img-top" src="{{ asset('storage/post/' . $editpost->image) }}" alt="">
            </div>
            <div class="col-md-7">
                <div class="header mt-4 mb-1 text-center"><h4>投稿の編集</h4></div>

                @if (session('post_success'))
                  <div class="mt-2 mx-2">
                    <div class="alert alert-success">
                      {{session('post_success')}}
                    </div>
                  </div>
                @endif

                <div class="card-body">
                <form method="POST" action="{{ route('post.update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $editpost->id }}">

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">タイトル</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $editpost->title }}">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">メッセージ</label>

                            <div class="col-md-6">
                                <textarea id="message" type="text" class="form-control" name="message">{{ $editpost->message }}</textarea>
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="topic" class="col-md-4 col-form-label text-md-right">トピック</label>

                            <div class="col-md-6">
                                <input id="topic" type="text" class="form-control @error('topic') is-invalid @enderror" name="topic" value="{{ $editpost->topic }}">

                                @error('topic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    更新
                                </button>
                                <a href="{{ route('post.delete', ['post_id'=>$editpost->id]) }}" class="btn btn-danger">ポストを削除</a>
                            </div>
                            <a href="{{ route('user.index') }}" class="btn btn-secondary">戻る</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

  <!-- <div class="card" style="width: 20rem;">
    
      <img class="card-img-top" src="{{ asset('storage/post/' . $editpost->image) }}" alt="">
      <div class="card-body">
        <h4 class="card-title">{{ $editpost->title }}</h4>
        <p class="card-text">{{ $editpost->message }}</p>
        <p>更新</p>
      </div>
  </div> -->

  <!-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ポスト編集</div>

                @if (session('post_success'))
                  <div class="mt-2 mx-2">
                    <div class="alert alert-success">
                      {{session('post_success')}}
                    </div>
                  </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('post.update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $editpost->id }}">

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">タイトル</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $editpost->title }}">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">メッセージ</label>

                            <div class="col-md-6">
                                <textarea id="message" type="text" class="form-control" name="message">{{ $editpost->message }}</textarea>
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="topic" class="col-md-4 col-form-label text-md-right">トピック</label>

                            <div class="col-md-6">
                                <input id="topic" type="text" class="form-control @error('topic') is-invalid @enderror" name="topic" value="{{ $editpost->topic }}">

                                @error('topic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    更新
                                </button>
                                <a href="{{ route('post.delete', ['post_id'=>$editpost->id]) }}" class="btn btn-danger">ポストを削除</a>
                            </div>
                            <a href="{{ route('user.index') }}" class="btn btn-secondary">戻る</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

    
  
  
</div>  
@endsection