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
        @if($animal->image)
            <div class="col">
                <x-images.avatar :path="$animal->image" :name="$animal->name"></x-images.avatar>
            </div>
        @endif
    </div>
    @auth
        <x-forms.edit-form :id="$animal->id" base="animals"></x-forms.edit-form>
    @endauth
@endsection
