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
            <label for="description">Description:</label>
            <textarea name="description" id="description">{{ old('description', $animal->description) }}</textarea>
        </div>

        <button type="submit">Update Animal</button>
    </form>

    <a href="{{ route('animals.index') }}">Back to Animals</a>
@endsection
