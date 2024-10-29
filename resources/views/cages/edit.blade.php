@extends('layouts.app')

@section('title', 'Редактировать клетку')

@section('content')
    <h1>Редактировать клетку</h1>
    <form action="{{ route('cages.update', $cage->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mt-3">
            <label class="form-label" for="name">Табличка:</label>
            <input class="form-control" type="text" name="name" id="title" value="{{ old('title', $cage->title) }}" required>
        </div>

        <div class="mt-3">
            <label class="form-label" for="size">Размер:</label>
            <textarea class="form-control" name="size" id="size">{{ old('size', $cage->size) }}</textarea>
        </div>
        <div class="btn-group">
            <button class="btn btn-primary" type="submit">Обновить информацию о клетке</button>
            <a class="btn btn-primary" href="{{ route('cages.index') }}">Назад к клеткам</a>
        </div>
    </form>
@endsection
