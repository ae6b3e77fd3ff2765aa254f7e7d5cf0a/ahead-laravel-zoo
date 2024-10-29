@extends('layouts.app')

@section('title', 'Редактировать клетку')

@section('content')
    <h1>Редактировать клетку</h1>
    <form action="{{ route('cages.update', $cage->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mt-3">
            <label class="form-label" for="name">Табличка:</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $cage->name) }}" required>
        </div>

        <div class="mt-3">
            <label class="form-label" for="size">Вместимость:</label>
            <textarea class="form-control" name="size" id="size">{{ old('size', $cage->description) }}</textarea>
        </div>

        <button class="btn btn-primary" type="submit">Обновить клетку</button>
    </form>

    <a class="btn btn-primary" href="{{ route('cages.index') }}">Назад к клеткам</a>
@endsection
