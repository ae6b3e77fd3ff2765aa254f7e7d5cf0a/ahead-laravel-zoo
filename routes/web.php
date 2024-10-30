<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::resource('cages', CageController::class)->except(['index', 'show'])->middleware('auth');
Route::resource('cages', CageController::class)->only(['index', 'show']);
Route::resource('animals', AnimalController::class)->except(['index', 'show'])->middleware('auth');
Route::resource('animals', AnimalController::class)->only(['index', 'show']);
Route::delete('animals/{id}/cage', [AnimalController::class, 'deleteFromCage'])->name('cages.animals.delete');


Route::get('/', function () {
    return redirect('/cages');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
