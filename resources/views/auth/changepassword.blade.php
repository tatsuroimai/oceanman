@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="header mt-4 mb-1 text-center"><h4>パスワードの変更</h4></div>

                @if (session('change_password_error'))
                  <div class=" mt-2 mx-2">
                    <div class="alert alert-danger">
                      {{session('change_password_error')}}
                    </div>
                  </div>
                @endif

                @if (session('change_password_success'))
                  <div class="mt-2 mx-2">
                    <div class="alert alert-success">
                      {{session('change_password_success')}}
                    </div>
                  </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('user.changepassword') }}">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="current" class="col-md-4 col-form-label text-md-right">現在のパスワード</label>

                            <div class="col-md-6">
                                <input id="current" type="password" class="form-control @error('current-password') is-invalid @enderror" name="current-password">

                                @error('current-password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('new-password') is-invalid @enderror" name="new-password">

                                @error('new-password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control @error('new-password_confirmation') is-invalid @enderror" name="new-password_confirmation">

                                @error('new-password_confirmation')
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
                            </div>
                            <a href="{{ route('user.edit') }}" class="btn btn-primary">戻る</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection