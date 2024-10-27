@extends('layouts.app')

@section('title', 'Создать клетку')

@section('content')
    <h1>Создать клетку</h1>
    <form action="{{ route('cages.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Табличка:</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>
        </div>

        <div>
            <label for="capacity">Вместимость:</label>
            <input type="text" name="capacity" id="capacity" required value="{{ old('capacity') }}">
        </div>

        <button type="submit">Добавить клетку</button>
    </form>

    <a href="{{ route('cages.index') }}">Назад к клеткам</a>
@endsection
