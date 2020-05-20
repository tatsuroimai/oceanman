@extends('layouts.app')
@section('title','ユーザー情報変更')

@section('content')
<div class="container col-lg-6">
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="topWrapper">
        @if(!empty($authUser->thumbnail))
            <img src="{{ asset('storage/user/' . $authUser->thumbnail) }}" class="editThumbnail">
        @else
        画像なし
        @endif
    </div>

    <form method="post" action="{{ route('user.userUpdate') }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $authUser->id }}">
        @error('id')
            <div class="error">{{ $message }}</div>
        @enderror

        <div class="labelTitle">Name</div>
        <div>
            <input type="text" class="userForm" name="name" placeholder="User" value="{{ $authUser->name }}">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="labelTitle">email</div>
        <div>
            <input type="text" class="userForm" name="email" placeholder="Mail" value="{{ $authUser->email }}">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="labelTitle">Thumbnail</div>
        <div>
            <input type="file" name="thumbnail">
        </div>

        <div class="buttonSet">
            <input type="submit" name="send" value="プロフィール更新" class="btn btn-primary btn-sm btn-done">
            <a href="{{ route('user.changepassword') }}" class="btn btn-outline-secondary btn-sm">パスワード変更</a>
            <a href="{{ route('user.delete') }}" class="btn btn-outline-danger btn-sm">アカウント削除</a>
            <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm">戻る</a>
        </div>
    </form>

    
    
    
</div>
@endsection