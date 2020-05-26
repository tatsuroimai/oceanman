<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Oceanman') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" ></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .home-inner {
            position: fixed;
            display: table;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-size: cover;
            background-position: center center;
            background-image: url("{{ asset('img/yuriy-mlcn-VVQeCl_Xe6g-unsplash.jpg') }}");
            }
        
        .sitelogo {
            font-family: 'Parisienne', cursive;
            /* height: 50px; */
            color: yellow;
        }

        .loginform {
            width: 100%;
            max-width: 100%;
            position: absolute;
            top: 17%;
            z-index: 1;
        }

        .loginbtn {
            color: white;
            background-color: #0D8F9B;
        }
    </style>
</head>
<body>
    <div id="app">
	<div class="home-wrap">
		<div class="home-inner"></div>
	</div>
    <div class="sitelogo p-4">
        <h1>Oceanman</h1>
    </div>
    <main class="loginform py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-lg">
                        <div class="header mt-4 mb-1 text-center"><h4>{{ __('Login') }}</h4></div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn loginbtn">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="row col-md-8 offset-md-4">
                                    <p class="mr-3">アカウントがありませんか？</p>
                                    <a href="{{ route('register') }}">登録する</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </main>
  </div>
</body>