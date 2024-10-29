@extends('layouts.app')

@section('title', 'Животные')

@section('content')
    <h1>Животные</h1>
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
            <h2>Есть клетки</h2>
            @if(count($animalsWithCages) < 1)
                <p>Пока ничего нет :(</p>
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
                    @foreach ($animalsWithCages as $animal)
                        <tr>
                            <th scope="row">{{ $animal->id }}</th>
                            <td><a class="link-info"
                                   href="{{ route('animals.show', $animal->id) }}">{{ $animal->name }}</a>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a class="btn btn-primary"
                                       href="{{ route('animals.edit', $animal->id) }}">Редактировать</a>
                                    <form action="{{ route('animals.destroy', $animal->id) }}" method="POST"
                                          style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-primary" type="submit">Удалить</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
        @endif
        <div class="col">
            <h2>Нет клеток</h2>
            @if(count($animalsWithoutCages) < 1)
                <p>Пока ничего нет :(</p>
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
                    @foreach ($animalsWithoutCages as $animal)
                        <tr>
                            <th scope="row">{{ $animal->id }}</th>
                            <td><a class="link-info"
                                   href="{{ route('animals.show', $animal->id) }}">{{ $animal->name }}</a>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <form action="{{ route('animals.destroy', $animal->id) }}" method="POST"
                                          style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group">
                                            <a class="btn btn-primary"
                                               href="{{ route('animals.edit', $animal->id) }}">Редактировать</a>
                                            <button class="btn btn-primary" type="submit">Удалить</button>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
        @endif
    </div>
    <a class="btn btn-primary" href="{{ route('animals.create') }}">Создать животное</a>
@endsection
