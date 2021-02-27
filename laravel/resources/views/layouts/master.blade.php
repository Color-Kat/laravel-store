<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('index')}}"> Color store </a>

    <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('index')}}"> Главная
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('categories')}}"> Категории </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('basket')}}"> Корзина </a>
            </li>

            <!-- <li class = "раскрывающийся список nav-item">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <font style = "vertical -align: inherit; "> <font style =" vertical-align: inherit; "> Падать </a>
            <div class = "dropdown-menu">
              <a class="dropdown-item" href="#"> Действие </a>
              <a class="dropdown-item" href="#"> Другое действие </ font > </a>
              <a class="dropdown-item" href="#"> Что-то еще здесь </a>
              <div class = "dropdown-divider"> </div>
              <a class="dropdown-item" href="#"> Отдельная ссылка </ font > </a>
            </div>
          </li> -->
        </ul>

        <ul class="nav navbar-nav navbar-right">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}"> Войти/зарегистрироваться</a>
                </li>
            @endguest

            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('get-logout')}}">Выйти</a>
                </li>
                {{--            <li class="nav-item">--}}
                {{--                <form action="{{route('get-logout')}}" method="post">--}}
                {{--                    <input type="submit" class="nav-link" value="Выйти">--}}
                {{--                    @csrf--}}
                {{--                </form>--}}
                {{--            </li>--}}
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}"> Админ панель </a>
                </li>
            @endauth
        </ul>

        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Поиск"/>
            <button class="btn btn-secondary my-2 my-sm-0" type="submit"> Поиск</button>
        </form>
    </div>
</nav>


<div class="container">
    @if(session()->has('success'))
        <p class="alert alert-success">{{session()->get('success')}}</p>
    @elseif (session()->has('warning'))
        <p class="alert alert-warning">{{session()->get('warning')}}</p>
    @endif
    @yield('content')
</div>
</body>

</html>
