<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CageController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::resource('animals', AnimalController::class);
Route::resource('cages', CageController::class);
