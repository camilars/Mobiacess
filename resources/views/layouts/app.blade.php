<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mobiacess</title>
    <style>
        
    li:hover {
        background: none;
        color: #fff;;

    }

    span {
      color: #3ec1d5;

  }

  h1 {
      color: #fff;
      padding: 0;
      margin: 0;
      font-size: 36px;
      font-weight: bold;
      line-height: 1;
      font-family: 'Raleway', sans-serif;

  }

  a:hover {
      color: #3EC1D5;
      text-decoration:none; 
  }

  a{

    transition: all 0.3s ease 0s;
    text-decoration: none;
    background-color: transparent;

  }

  ul{

    margin-left: 30%;
    text-decoration: none;
  }


    </style>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
  <link href="/css/style.css" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="/css/responsive.css" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="/css/nivo-slider-theme.css" rel="stylesheet">
  <link href="lib/jquery/jquery.min.js" rel="stylesheet">

    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light navbar-laravel" style="background-color: rgba(0, 0, 0, 1);
  font-size: 15px;
  font-weight: 500;
  padding: 12px 0px;
  text-transform: capitalize;
  letter-spacing: 1px;">
            <div class="container">
                <a class="navbar-brand page-scroll sticky-logo" href="{{ url('/') }}">
                    <h1><span>M</span>obiacess</h1>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                            <!-- <li class="nav-item" >
                                <a class="page-scroll" href="{{action('LocalController@loadmap')}}">Acessar Mapa</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="page-scroll" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="page-scroll" href="{{ route('register') }}">{{ __('Cadastrar-se') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="page-scroll" href="{{action('LocalController@create')}}">Cadastrar Local</a>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll" href="{{action('LocalController@index')}}">visualizar Local</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="page-scroll dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-street-view" style="font-size:20;"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" style="background-color:#000000;" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
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
</body>
</html>
