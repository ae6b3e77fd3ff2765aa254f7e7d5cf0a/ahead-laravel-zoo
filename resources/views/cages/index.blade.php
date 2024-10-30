@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
    <h1>Информация о зоопарке</h1>
    <p>В зоопарке на данный момент проживает {{ DB::table('animals')->count() }} животных. Из
        них {{ DB::table('cages')->sum('count') }} в клетках.
        Имеется {{ DB::table('cages')->count() }} клеток.
    </p>
    <x-alerts.alert></x-alerts.alert>
    <div class="row align-content-center">
        <div class="col">
            <x-cages.cage-list :cages="$cages"></x-cages.cage-list>
        </div>
    </div>

    @auth
        <a class="btn btn-primary" href="{{ route('cages.create') }}">Создать клетку</a>
    @endauth
@endsection
