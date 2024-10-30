@extends('layouts.app')

@section('title', 'Информация о клетке')

@section('content')
    <h1>{{ $cage->name }}</h1>
    <x-alerts.alert></x-alerts.alert>
    <div class="row align-content-center">
        <x-cages.cage :id="$cage->id" :name="$cage->name" :size="$cage->size" :count="$cage->count" :/>
        <div class="col">
            <h2>Животные</h2>
            <div class="row align-content-center">
                <div class="col">
                    <x-animals.animal-list :animals="$animals"></x-animals.animal-list>
                </div>
            </div>
        </div>
    </div>
@endsection
