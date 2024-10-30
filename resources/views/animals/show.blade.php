@extends('layouts.app')

@section('title', 'Информация о животном')

@section('content')
    <h1>{{ $animal->name }}</h1>
    <x-alerts.alert></x-alerts.alert>
    <div class="row align-items-center">
        <div class="col">
            <x-animals.animal :id="$animal->id" :name="$animal->name" :species="$animal->species" :age="$animal->age"
                              :image="$animal->image"
                              :cage="$animal->cage_id"
                              :desc="$animal->desc"></x-animals.animal>
        </div>
        <div class="col text-center">
            <h2>Аватарка</h2>
            <img src="{{ asset('storage/' . $animal->image) }}" alt="{{ $animal->name }}'s avatar"
                 style="max-width: 100%; height: auto;">
        </div>
    </div>
    @auth
        <x-forms.edit-form :id="$id" :base="$animals"></x-forms.edit-form>
    @endauth
@endsection
