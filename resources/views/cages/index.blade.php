@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
    <h1>Главная страница</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col">
            <h2>Информация о зоопарке</h2>
            <p>В зоопарке на данный момент проживает {{ DB::table('animals')->count() }} животных. Из
                них {{ DB::table('animals')->whereNot('cage_id', null)->count() }} в клетках.
                Имеется {{ DB::table('cages')->count() }} клеток.
            </p>
        </div>
        <div class="col">
            <h2>Клетки</h2>
            <div class="mt-3">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Табличка</th>
                        <th scope="col">Управление</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($cages as $cage)
                        <tr>
                            <th scope="row">{{ $cage->id }}</th>
                            <td><a class="link-info" href="{{ route('cages.show', $cage->id) }}">{{ $cage->title }}</a>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a class="btn btn-primary"
                                       href="{{ route('cages.edit', $cage->id) }}">Редактировать</a>
                                    <form action="{{ route('cages.destroy', $cage->id) }}" method="POST"
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
        </div>
    </div>
    <a class="btn btn-primary" href="{{ route('cages.create') }}">Создать клетку</a>
@endsection
