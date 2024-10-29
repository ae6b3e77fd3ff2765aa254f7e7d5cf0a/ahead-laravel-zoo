<?php

use App\Http\Controllers\Animal\AnimalController;
use App\Http\Controllers\Cage\CageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::resource('cages', CageController::class);
Route::resource('animals', AnimalController::class);
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
