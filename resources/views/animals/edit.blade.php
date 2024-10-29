@extends('layouts.app')

@section('title', 'Редактировать животное')

@section('content')
    <h1>Редактировать животное</h1>
    <form action="{{ route('animals.update', $animal->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Указываем метод PUT для обновления -->

        <div>
            <label for="name">Имя:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $animal->name) }}" required>
        </div>

        <div>
            <label for="description">Описание:</label>
            <textarea name="description" id="description">{{ old('description', $animal->description) }}</textarea>
        </div>
        <div class="btn-group">
            <button type="submit">Обновить информацио о животном</button>
            <a class="btn btn-primary" href="{{ route('animals.index') }}">Назад к животным</a>
        </div>
    </form>
@endsection
