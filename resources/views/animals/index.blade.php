@extends('layouts.app')

@section('title', 'Животные')

@section('content')
    <h1>Животные</h1>
    <a href="{{ route('animals.create') }}">Создать животное</a>
    <ul>
        @foreach ($animals as $animal)
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
@endsection
