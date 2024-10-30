@extends('layouts.app')

@section('title', 'Животные')

@section('content')
    <h1>Животные</h1>
    <x-alerts.alert></x-alerts.alert>
    <div class="row align-content-center">
        <div class="col">
            <x-animals.animal-list :animals="$animals"></x-animals.animal-list>
        </div>
    </div>
    @auth
        <a class="btn btn-primary" href="{{ route('animals.create') }}">Создать животное</a>
    @endauth
@endsection
