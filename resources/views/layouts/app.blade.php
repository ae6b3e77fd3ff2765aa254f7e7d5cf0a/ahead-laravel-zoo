<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Зоопарк')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <style>
        html, body {
            height: 100%;
        }

        .wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 10px 0;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <header>
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <div class="container-fluid">
                <div class="d-flex">
                    <a class="navbar-brand" href="{{ url('/') }}">🐘 Зоопарк</a>
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="{{ route('cages.index') }}">Индекс клеток</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('animals.index') }}">Индекс животных</a>
                        </li>
                    </ul>
                </div>
                @auth
                    <form class="d-flex" method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-primary">Выйти</button>
                    </form>
                @endauth
            </div>
        </nav>
    </header>
    <div class="wrapper">
        <main class="content">
            <div class="container">
                @yield('content')
            </div>
        </main>

        <footer class="footer">
            <div class="container">
                <span class="text-muted">© 2024 Зоопарк. Все права защищены.</span>
            </div>
        </footer>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
