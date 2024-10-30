@extends('layouts.app')

@section('title', 'Редактировать животное')

@section('content')
    <h1>Редактировать животное</h1>
    <x-alerts.alert></x-alerts.alert>
    <form action="{{ route('animals.update', $animal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label" for="name">Имя:</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="Имя..."
                   value="{{ old('name', $animal->name) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="name">Вид:</label>
            <input class="form-control" type="text" name="species" id="species" placeholder="Вид..."
                   value="{{ old('species', $animal->species) }}" required>
        </div>
        <div class="mb-3">
            <label for="gender">Пол:</label>
            <select name="gender" id="gender">
                <option value="0">Мужской</option>
                <option value="1">Женский</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="name">Возраст:</label>
            <input class="form-control" type="number" min="0" max="100" name="age" id="age" placeholder="Возраст..."
                   value="{{ old('age', $animal->age) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="desc">Описание:</label>
            <textarea class="form-control" name="desc"
                      id="description">{{ old('desc', $animal->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label" for="cage_id">Клетка:</label>
            <select class="form-control" id="cage_id" name="cage_id">
                <option value="" disabled selected>Выберите клетку:</option>
                @foreach($cages as $cage)
                    <option value="{{ $cage->id }}">{{ $cage->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="image">Аватарка:</label>
            <input class="form-control" type="file" name="image" id="image" accept="image/*">
        </div>
        <div class="btn-group">
            <button type="submit">Редактировать животное</button>
            <a class="btn btn-primary" href="{{ route('animals.index') }}">Назад к животным</a>
        </div>
    </form>
@endsection
