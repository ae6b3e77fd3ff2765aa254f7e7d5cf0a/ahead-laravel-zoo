@extends('layouts.app')

@section('title', 'Информация о клетке')

@section('content')
    <h1>{{ $cage->name }}</h1>
    <p><strong>Идентификатор:</strong> {{ $cage->id }}</p>
    <p><strong>Табличка:</strong> {{ $cage->title }}</p>
    <p><strong>Заполнено:</strong> {{ count($cage->animals) }}</p>
    <p><strong>Вместимость:</strong> {{ $cage->capacity  }}</p>
    <p><strong>Создано:</strong> {{ $cage->created_at }}</p>
    <p><strong>Изменено:</strong> {{ $cage->updated_at }}</p>
    <h2>Животные</h2>
    <a href="{{ route('animals.create') }}">Добавить животное</a>
    <ul>
        @foreach ($cage->animals as $animal)
            <li>
                <a href="{{ route('animals.show', $animal->id) }}">{{ $animal->name }}</a>
                <a href="{{ route('animals.edit', $animal->id) }}">Изменить</a>
                <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('cages.edit', $cage->id) }}">Редактировать</a>
    <form action="{{ route('cages.destroy', $cage->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Удалить</button>
    </form>
    <a href="{{ route('cages.index') }}">Назад к клеткам</a>
@endsection
