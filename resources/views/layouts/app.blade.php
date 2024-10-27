<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Зоопарк')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Подключение CSS -->
</head>
<body>
<header>
    <h1>Добро пожаловать в Зоопарк!</h1>
    <nav>
        <ul>
            <li><a href="{{ route('cages.index') }}">Клетки</a></li>
            <li><a href="{{ route('animals.index') }}">Животные</a></li>
        </ul>
    </nav>
</header>

<main>
    @yield('content') <!-- Секция для контента -->
</main>

<footer>
    <p>&copy; {{ date('Y') }} Зоопарк. Все права защищены.</p>
</footer>
</body>
</html>
