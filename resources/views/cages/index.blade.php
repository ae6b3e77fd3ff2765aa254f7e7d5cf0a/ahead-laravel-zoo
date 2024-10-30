@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
    <h1>Главная страница</h1>
    <x-alerts.alert></x-alerts.alert>

    <h2>Информация о зоопарке</h2>
    <p>В зоопарке на данный момент проживает {{ DB::table('animals')->count() }} животных. Из
        них {{ DB::table('animals')->whereNot('cage_id', null)->count() }} в клетках.
        Имеется {{ DB::table('cages')->count() }} клеток.
    </p>

    <div class="row align-content-center">
        <div class="col">
            <x-cages.cage-list :cages="$cages"></x-cages.cage-list>
        </div>
    </div>

    @auth
        <a class="btn btn-primary" href="{{ route('cages.create') }}">Создать клетку</a>
    @endauth
@endsection
