@extends('layouts.app')

@section('title', 'Создать животное')

@section('content')
    <h1>Создать животное</h1>
    <x-alerts.alert></x-alerts.alert>
    <form action="{{ route('animals.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="name">Имя:</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="Имя..." value="{{ old('name') }}"
                   required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="name">Вид:</label>
            <input class="form-control" type="text" name="species" id="species" placeholder="Вид..."
                   value="{{ old('species') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="gender">Пол:</label>
            <select class="form-control" name="gender" id="gender">
                <option value="0">Мужской</option>
                <option value="1">Женский</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="name">Возраст:</label>
            <input class="form-control" type="number" min="0" max="100" name="age" id="age" placeholder="Возраст..."
                   value="{{ old('age') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="desc">Описание:</label>
            <textarea class="form-control" name="desc" placeholder="Описание..."
                      id="desc">{{ old('desc') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="cage_id">Клетка:</label>
            <select class="form-control" id="cage_id" name="cage_id">
                <option value="" disabled selected>№ клетки:</option>
                @foreach($cages as $cage)
                    <option value="{{ $cage->id }}">{{ $cage->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="image">Аватарка:</label>
            <input class="form-control" type="file" name="image" id="image" accept="image/*">
        </div>
        <div class="btn-group">
            <button class="btn btn-primary" type="submit">Добавить животное</button>
            <a class="btn btn-primary" href="{{ route('animals.index') }}">Назад к животным</a>
        </div>
    </form>
@endsection
