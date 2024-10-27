<?php

namespace App\Http\Controllers;

use App\Http\Requests\Animal\StoreAnimalRequest;
use App\Http\Requests\Animal\UpdateAnimalRequest;
use App\Models\Animal;
use App\Models\Cage;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $animals = Animal::all();
        return view('animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $cages = Cage::all();
        return view('animals.create', compact('cages'));
    }

    /**
     * Animal a newly created resource in storage.
     */
    public function store(StoreAnimalRequest $request)
    {
        //
        Animal::create($request->validated());
        return redirect()->route('animals.index')->with('success', 'Animal created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $animal = Animal::findOrFail($id);
        return view('animals.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $animal = Animal::findOrFail($id);
        return view('animals.edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnimalRequest $request, string $id)
    {
        //
        $animal = Animal::findOrFail($id);
        $animal->update($request->validated());
        return redirect()->route('animals.index')->with('success', 'Animal updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $animal = Animal::findOrFail($id);
        $animal->delete();
        return redirect()->route('animals.index')->with('success', 'Animal deleted successfully.');
    }
}
