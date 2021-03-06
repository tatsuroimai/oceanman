<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'oceanman') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
    <style>
        .sitelogo {
            font-family: 'Parisienne', cursive;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand sitelogo " href="{{ url('/') }}">
                    {{ config('app.name', 'Oceanman') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <form method="GET" action="{{ route('post.search') }}" class="form-inline">
                        @csrf
                        <div class="form-group">        
                            <input class="form-control mr-sm-2" type="search" placeholder="キーワード検索" aria-label="Search" name="keyword">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="topic">
                                <option>トピックで検索</option>
                                @foreach($topics as $topic)
                                <option>{{ $topic->topic }}</option>
                                @endforeach
                            </select>                           
                        </div>
                        <button class="btn btn-outline-success ml-2 my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="position:relative; padding-left:50px">
                                    @if(Auth::user()->thumbnail)
                                        <img src="{{ $authUser->thumbnail }}" class="thumbnail" style="width:30px; height:30px; position:absolute; top:5px; left:10px;" alt="">
                                    @else
                                        <img src="{{ asset('img/blank-profile-picture-973460_640.png') }}" class="thumbnail" style="width:30px; height:30px; position:absolute; top:5px; left:10px;" alt="">
                                    @endif 
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"　href="{{ route('user.index') }}">マイプロフィール</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/macy@2"></script>

    
    @if(!preg_match('/edit|changepassword|delete|post|add|show/', $_SERVER['REQUEST_URI']) || strstr($_SERVER['REQUEST_URI'], '/user/show') || strstr($_SERVER['REQUEST_URI'], '/post/search'))
        
        <script src="{{ asset('/js/macy.js') }}"></script>
    @endif

 



</body>
</html>
