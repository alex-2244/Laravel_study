<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    {{-- fas fa icons --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" rel="stylesheet">
 
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}

    <style>
      .nav-item .nav-link {
        color:#fff !important;
      }
    </style>
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color: #0052CC;">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}" style="font-weight: 600;color: #fff;">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>

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
                <a id="navbarDropdown"style="color: #fff;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
      <div class="container">
        <div class="row">

            @if (Auth::check())
                <div class="col-lg-3">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="list-group-item">
                          <a href="{{ route('categories') }}">Categories</a>
                        </li>
                        <li class="list-group-item">
                          <a href="{{ route('category.create') }}">Create new categories</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('posts') }}">All Posts</a>
                        </li>
                        <li class="list-group-item">
                          <a href="{{ route('post.trashed') }}">All Trashed</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('post.create') }}">Create new post</a>
                        </li>
                    </ul>
                </div>
            @endif

          <div class="col-lg-9" style="margin: 0 auto;">
                @yield('content')
          </div>

        </div>
      </div>
    </main>
  </div>

  

  {{-- script --}}
  <script src="{{ asset('js/toastr.min.js') }}"></script>

    <script>
      @if(Session::has('success'))
        toastr.success(" {{ Session::get('success') }} ")
        
      @elseif(Session::has('info'))
      toastr.info("{{ Session::get('info') }}")

      @elseif(Session::has('error'))
        toastr.error("{{ Session::get('error') }}")
      @endif
      
    </script>
    
</body>
</html>
