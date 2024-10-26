<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header>
    <h1>My Application</h1>
    <nav>
        <ul>
            <li><a href="{{ route('animals.index') }}">Animals</a></li>
            <li><a href="{{ route('cages.index') }}">Cages</a></li>
        </ul>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    <p>&copy; {{ date('Y') }} My Application</p>
</footer>
</body>
</html>
