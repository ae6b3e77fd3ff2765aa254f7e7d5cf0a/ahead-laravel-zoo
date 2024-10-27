@extends('layouts.app')

@section('title', 'Клетки')

@section('content')
    <h1>Клетки</h1>
    <a href="{{ route('cages.create') }}">Создать клетку</a>
    <ul>
        @foreach ($cages as $cage)
            <li>
                <a href="{{ route('cages.show', $cage->id) }}">{{ $cage->title }}</a>
                <a href="{{ route('cages.edit', $cage->id) }}">Редактировать</a>
                <form action="{{ route('cages.destroy', $cage->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
