@extends('layouts.app')

@section('title', 'Создать клетку')

@section('content')
    <h1>Создать клетку</h1>
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
    <form action="{{ route('cages.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label" for="name">Табличка:</label>
            <input class="form-control" type="text" name="title" id="title" placeholder="Название..." value="{{ old('title') }}" required>
        </div>

        <div class="mb-3" >
            <label class="form-label" for="size">Размер:</label>
            <input class="form-control" type="number" min="0" max="100" step="1" placeholder="Размер..." name="size"
                   id="size" required value="{{ old('size') }}">
        </div>
        <div class="btn-group">
            <button class="btn btn-primary mb-3" type="submit">Добавить клетку</button>
            <a class="btn btn-primary" href="{{ route('cages.index') }}">Назад к клеткам</a>
        </div>
    </form>
@endsection
