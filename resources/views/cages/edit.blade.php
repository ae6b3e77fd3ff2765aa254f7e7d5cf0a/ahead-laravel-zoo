@extends('layouts.app')

@section('title', 'Редактировать клетку')

@section('content')
    <h1>Редактировать клетку</h1>
    <form action="{{ route('cages.update', $cage->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Табличка:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $cage->name) }}" required>
        </div>

        <div>
            <label for="description">Вместимость:</label>
            <textarea name="description" id="description">{{ old('description', $cage->description) }}</textarea>
        </div>

        <button type="submit">Обновить клетку</button>
    </form>

    <a href="{{ route('cages.index') }}">Назад к клеткам</a>
@endsection
