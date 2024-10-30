@extends('layouts.app')

@section('title', 'Создать клетку')

@section('content')
    <h1>Создать клетку</h1>
    <x-alerts.alert></x-alerts.alert>
    <form action="{{ route('cages.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="name">Табличка:</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="Название..." value="{{ old('name') }}" required>
        </div>
        <div class="mb-3" >
            <label class="form-label" for="size">Размер:</label>
            <input class="form-control" type="number" min="0" max="100" step="1" placeholder="Размер..." name="size"
                   id="size" required value="{{ old('size') }}">
        </div>
        <div class="btn-group">
            <button class="btn btn-primary" type="submit">Добавить клетку</button>
            <a class="btn btn-primary" href="{{ route('cages.index') }}">Назад к клеткам</a>
        </div>
    </form>
@endsection
