@extends('layouts.app')

@section('title', 'Информация о животном')

@section('content')
    <h1>{{ $animal->name }}</h1>
    <p><strong>Идентификатор:</strong> {{ $animal->id }}</p>
    <p><strong>Вид:</strong> {{ $animal->species }}</p>
    <p><strong>Возраст:</strong> {{ $animal->age }}</p>
    <p><strong>Информация:</strong> {{ $animal->description }}</p>
    <p><strong>Создано:</strong> {{ $animal->created_at }}</p>
    <p><strong>Изменено:</strong> {{ $animal->updated_at }}</p>

    <a href="{{ route('animals.edit', $animal->id) }}">Редактировать</a>
    <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Удалить</button>
    </form>
    <a href="{{ route('animals.index') }}">Назад к животным</a>
@endsection
