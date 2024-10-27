@extends('layouts.app')

@section('title', 'Создать животное')

@section('content')
    <h1>Создать животное</h1>
    <form action="{{ route('animals.store') }}" method="POST">
        @csrf <!-- Защита от CSRF-атак -->

        <div>
            <label for="name">Имя:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="name">Вид:</label>
            <input type="text" name="species" id="species" value="{{ old('species') }}" required>
        </div>

        <div>
            <label for="name">Возраст:</label>
            <input type="number" min="0" max="100" name="age" id="age" value="{{ old('age') ?? 0 }}" required>
        </div>

        <div>
            <label for="description">Описание:</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="cage_id">Клетка:</label>
            <select class="form-control" id="cage_id" name="cage_id">
                <option value="" disabled selected>Выберите клетку:</option>
                @foreach($cages as $cage)
                    <option value="{{ $cage->id }}">{{ $cage->title }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Добавить животное</button>
    </form>

    <a href="{{ route('animals.index') }}">Назад к животным</a>
@endsection
