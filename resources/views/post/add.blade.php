@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="header mt-4 mb-1 text-center"><h4>投稿</h4></div>

                @if (session('post_success'))
                  <div class="mt-2 mx-2">
                    <div class="alert alert-success">
                      {{session('post_success')}}
                    </div>
                  </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('post.create') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">画像</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">タイトル</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">

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
                                <textarea id="message" type="text" class="form-control" name="message">{{ old('message') }}</textarea>
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
                                <input id="topic" type="text" class="form-control @error('topic') is-invalid @enderror" name="topic" value="{{ old('topic') }}">

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
                                    投稿
                                </button>
                            </div>
                            <a href="{{ route('user.index') }}" class="btn btn-secondary">戻る</a>
                        </div>
                    </form>

                    <!-- <div class="form-group">
                        <label for="inputFile">File input</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputFile">
                            <label class="custom-file-label" for="inputFile" data-browse="参照">Choose file</label>
                        </div>
                    </div> -->
  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection