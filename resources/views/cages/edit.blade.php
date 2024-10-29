@extends('layouts.app')

@section('title', 'Редактировать клетку')

@section('content')
    <h1>Редактировать клетку</h1>
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
    <form action="{{ route('cages.update', $cage->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label" for="name">Табличка:</label>
            <input class="form-control" type="text" name="name" id="title" value="{{ old('title', $cage->title) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="size">Размер:</label>
            <input class="form-control" type="number" min="0" max="100" step="1" name="size" id="size" required value="{{ old('size', $cage->size) }}">
        </div>
        <div class="btn-group">
            <button class="btn btn-primary" type="submit">Редактировать клетку</button>
            <a class="btn btn-primary" href="{{ route('cages.index') }}">Назад к клеткам</a>
        </div>
    </form>
@endsection
