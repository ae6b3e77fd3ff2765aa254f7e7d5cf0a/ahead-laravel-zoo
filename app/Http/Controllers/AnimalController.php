<?php

namespace App\Http\Controllers;

use App\Http\Requests\Animal\StoreAnimalRequest;
use App\Http\Requests\Animal\UpdateAnimalRequest;
use App\Models\Animal;
use App\Models\Cage;
use Illuminate\Support\Facades\DB;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $animals = Animal::paginate(10);
        return view('animals.index', compact('animals'));
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
            $data['image'] = $request->file('image')->store('images', 'public');
        }
        $animal = Animal::create($data);
        return redirect()->back()->with('success', "Новое животное с индексом $animal->id успешно создано.");
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
        $cages = Cage::all();
        return view('animals.edit', compact('animal', 'cages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnimalRequest $request, string $id)
    {
        //
        $animal = Animal::findOrFail($id);
        $animal->update($request->validated());
        return redirect()->back()->with('success', "Животное с индексом $id успешно отредактировано");
    }

    public function deleteFromCage(string $id)
    {
        $animal = Animal::findOrFail($id);
        $animal->cage_id = null;
        $animal->save();
        return redirect()->back()->with('success', "Животное с индексом $id успешно удалено из клетки.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $animal = Animal::findOrFail($id);
        $animal->delete();
        return redirect()->back()->with('success', "Животное с индексом $id успешно удалено.");
    }
}
