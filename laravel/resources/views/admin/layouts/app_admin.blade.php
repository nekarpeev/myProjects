<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- <div class="container">
          <div class="row">
            <div class="col-sm-3">
              <div class="jumbotron">
                <p><span class="label label-primary">Категорий 0</span></p>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="jumbotron">
                <p><span class="label label-primary">Материалов 0</span></p>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="jumbotron">
                <p><span class="label label-primary">Посетителей 0</span></p>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="jumbotron">
                <p><span class="label label-primary">Сегодня 0</span></p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">

              <a class="list-group-item" href="#">
                <h4 class="list-group-item-heading">Категория первая</h4>
                <p class="list-group-item-text">
                  Кол-во материалов
                </p>
              </a>
            </div>
            <div class="col-sm-6">
              <a class="btn btn-block btn-default" href="#">Создать материал</a>
              <a class="list-group-item" href="#">
                <h4 class="list-group-item-heading">Материал первый</h4>
                <p class="list-group-item-text">
                  Категория
                </p>
              </a>
            </div>
          </div>
        </div> -->
        @yield('admin_content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
