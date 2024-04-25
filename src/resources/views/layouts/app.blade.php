<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attendance Management</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @yield('css')
</head>

<body>
  <header class="header">
  <div class="header__inner">
        <a class="header__logo" href="/">
          FashionablyLate
        </a>
    </div>
    <div class="header__contents">
        <nav>
          <ul class="header-nav">
          @if(Auth::check())
            <li class="header-nav__item">
              <!-- <form action="/logout" method="post">
                @csrf
                <a class="header-nav__button" href="/login">logout</a>
              </form> -->
              <form action="{{ route('logout') }}" method="post">
                @csrf 
                    <!-- <button type="submit">ログアウト</button> -->
                    <button class="header-nav__button" type="submit">logout</button>
              </form>
            </li>
            @elseif(Request::is('localhost/login'))
                <li class="header-nav__item">
                <!-- <form action="/logout" method="post">
                    @csrf
                    <a class="header-nav__button" href="/login">logout</a>
                </form> -->
                <form action="{{ route('logout') }}" method="post">
                    @csrf 
                        <!-- <button type="submit">ログアウト</button> -->
                        <button class="header-nav__button" type="submit">test</button>
                </form>
                </li>
            @else
            <li class="header-nav__item">
              <form action="/register" method="get">
                @csrf 
                    <!-- <button type="submit">ログアウト</button> -->
                    <!-- <button onclick=location.href="/register" class="header-nav__button" >register</button> -->
                    <button class="header-nav__button" type="submit" >register</button>
              </form>
              <!-- <button class="header-nav__button" type="submit">register</button> -->
            </li>
            @endif
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <main>
    @yield('content')
  </main>
</body>

</html>