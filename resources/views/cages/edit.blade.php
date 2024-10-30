@extends('layouts.app')

@section('title', 'Редактировать клетку')

@section('content')
    <h1>Редактировать клетку</h1>
    <x-alerts.alert></x-alerts.alert>
    <form action="{{ route('cages.update', $cage->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label" for="name">Табличка:</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ old('title', $cage->name) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="size">Размер:</label>
            <input class="form-control" type="number" min="0" max="100" step="1" name="size" id="size" required value="{{ old('size', $cage->size) }}">
        </div>
        <div class="btn-group">
            <a class="btn btn-primary" href="{{ route('cages.index') }}">К индексу</a>
            <button class="btn btn-primary" type="submit">Сохранить изменения</button>
            <a class="btn btn-primary" href="{{ route('cages.show', $cage->id) }}">Назад к клетке</a>
        </div>
    </form>
@endsection
