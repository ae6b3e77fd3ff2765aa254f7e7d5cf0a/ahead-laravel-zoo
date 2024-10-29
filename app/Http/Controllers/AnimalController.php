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
        $animalsWithCages = Animal::whereNot('cage_id', null)->get();
        $animalsWithoutCages = Animal::where('cage_id', null)->get();
        return view('animals.index', compact('animalsWithCages', 'animalsWithoutCages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cages = Cage::all();
        return view('animals.create', compact('cages'));
    }

    /**
     * Animal a newly created resource in storage.
     */
    public function store(StoreAnimalRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
        } else {
            $path = public_path('images/default.jpg');
        }
        $data['path_to_image'] = $path;
        unset($data['image']);
        Animal::create($data);
        return redirect()->route('animals.index')->with('success', 'Новое животное успешно создано.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $animal = Animal::with('cage')->findOrFail($id);
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
        return redirect()->route('animals.show', $id)->with('success', 'Животное успешно отредактировано');
    }

    public function deleteFromCage(string $id)
    {
        $animal = Animal::findOrFail($id);
        $animal->cage_id = null;
        $animal->save();
        return redirect()->route('animals.index')->with('success', 'Животное успешно удалено из клетки.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $animal = Animal::findOrFail($id);
        $animal->delete();
        return redirect()->route('animals.index')->with('success', 'Животное успешно удалено.');
    }
}
