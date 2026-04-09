
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
                <a class="header__logo" href="/">Todo</a>
                <nav>
                    <ul class="header__nav">
                        {{-- ログインしている時だけ表示 --}}
                        @auth
                        <li class="header__nav-item">
                            <a class="header__nav-link" href="/categories">カテゴリ一覧</a>
                        </li>
                        <li class="header__nav-item">
                            <form action="/logout" method="post">
                                @csrf
                                <button class="header__nav-button">ログアウト</button>
                            </form>
                        </li>
                        @endauth

                        {{-- ログインしていない時（ログイン画面など）に表示 --}}
                        @guest
                        <li class="header__nav-item">
                            <a class="header__nav-link" href="/register">会員登録</a>
                        </li>
                        <li class="header__nav-item">
                            <a class="header__nav-link" href="/login">ログイン</a>
                        </li>
                        @endguest
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
