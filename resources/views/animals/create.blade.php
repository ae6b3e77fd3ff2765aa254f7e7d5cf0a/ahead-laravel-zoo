@extends('layouts.app')

@section('title', 'Создать животное')

@section('content')
    <h1>Создать животное</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
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
            <label class="form-label" for="name">Возраст:</label>
            <input class="form-control" type="number" min="0" max="100" name="age" id="age" placeholder="Возраст..."
                   value="{{ old('age') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="description">Описание:</label>
            <textarea class="form-control" name="description" placeholder="Описание..."
                      id="description">{{ old('description') }}</textarea>
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
            <button class="form-control" type="submit">Добавить животное</button>
            <a class="btn btn-primary" href="{{ route('animals.index') }}">Назад к животным</a>
        </div>
    </form>
@endsection
