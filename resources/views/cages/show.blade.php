@extends('layouts.app')

@section('title', 'Информация о клетке')

@section('content')
    <h1>{{ $cage->title }}</h1>
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
        </div>
    @endif
    <div class="row align-content-center">
        <div class="col">
            <h2>Информация</h2>
            <p><strong>Идентификатор:</strong> {{ $cage->id }}</p>
            <p><strong>Табличка:</strong> {{ $cage->title }}</p>
            <p><strong>Проживает:</strong> {{ count($cage->animals) }}</p>
            <p><strong>Свободно:</strong> {{ $cage->size - count($cage->animals)  }}</p>
            <p><strong>Создано:</strong> {{ $cage->created_at }}</p>
            <p><strong>Изменено:</strong> {{ $cage->updated_at }}</p>
        </div>
        <div class="col">
            <h2>Животные</h2>
            @if(count($cage->animals) < 1)
                <p> Пока ничего нет :( </p>
            @else
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Животное</th>
                        <th scope="col">Управление</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($cage->animals as $animal)
                        <tr>
                            <th scope="row">{{ $animal->id }}</th>
                            <td><a class="link-info"
                                   href="{{ route('animals.show', $animal->id) }}">{{ $animal->name }}</a>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a class="btn btn-primary"
                                       href="{{ route('animals.edit', $animal->id) }}">Редактировать</a>
                                    <form action="{{ route('cages.animals.delete', $animal->id) }}" method="POST"
                                          style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-primary" type="submit">Удалить из клетки</button>
                                    </form>
                                    <form action="{{ route('animals.destroy', $animal->id) }}" method="POST"
                                          style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-primary" type="submit">Просто Удалить</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a class="btn btn-primary" href="{{ route('animals.create') }}">Добавить животное</a>
        </div>
        @endif
    </div>
    <a class="btn btn-primary" href="{{ route('cages.edit', $cage->id) }}">Редактировать</a>
    <form action="{{ route('cages.destroy', $cage->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <div class="btn-group">
            <button class="btn btn-primary" type="submit">Удалить</button>
            <a class="btn btn-primary" href="{{ route('cages.index') }}">Назад к клеткам</a>
        </div>
    </form>
@endsection
