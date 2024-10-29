@extends('layouts.app')

@section('title', 'Информация о животном')

@section('content')
    <h1>{{ $animal->name }}</h1>
    <div class="row align-items-center">
        <div class="col">
            <h2>Информация</h2>
            <p><strong>Идентификатор:</strong> {{ $animal->id }}</p>
            <p><strong>Вид:</strong> {{ $animal->species }}</p>
            <p><strong>Возраст:</strong> {{ $animal->age }}</p>
            <p><strong>Информация:</strong> {{ $animal->description }}</p>
            <p><strong>Создано:</strong> {{ $animal->created_at }}</p>
            <p><strong>Изменено:</strong> {{ $animal->updated_at }}</p>
            @if($animal->cage)
                <p><strong>Клетка:</strong> <a href="{{ route('cages.show', $animal->cage->id) }}">{{ $animal->cage->title  }}</a></p>
            @endif
        </div>
        <div class="col text-center">
            <h2>Аватарка</h2>
            <img src="{{ asset('storage/' . $animal->path_to_image) }}" alt="{{ $animal->name }} avatar" style="max-width: 100%; height: auto;">
        </div>
    </div>

    <a class="btn btn-primary" href="{{ route('animals.edit', $animal->id) }}">Редактировать</a>
    <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button class="btn btn-primary" type="submit">Удалить</button>
    </form>
    <a class="btn btn-primary" href="{{ route('animals.index') }}">Назад к животным</a>
@endsection
