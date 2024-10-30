<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cage\StoreCageRequest;
use App\Http\Requests\Cage\UpdateCageRequest;
use App\Models\Animal;
use App\Models\Cage;

class CageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cages = Cage::paginate(10);
        return view('cages.index', compact('cages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('cages.create');
    }

    /**
     * Animal a newly created resource in storage.
     */
    public function store(StoreCageRequest $request)
    {
        //
        $cage = Cage::create($request->validated());
        return redirect()->route('cages.index')->with('success', "Новая клетка с индексом $cage->id успешно создана.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $cage = Cage::findOrFail($id);
        $animals = Animal::where('cage_id', $id)->paginate(10);
        return view('cages.show', compact('cage', 'animals'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $cage = Cage::findOrFail($id);
        return view('cages.edit', compact('cage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCageRequest $request, string $id)
    {
        //
        $cage = Cage::findOrFail($id);
        $data = $request->validated();
        if ($data['size'] < $cage->size) {
            return redirect()->route('cages.edit', $id)->withErrors('Размер клетки меньше, чем в ней проживает животных!');
        }
        $cage->update($data);
        return redirect()->route('cages.show', $id)->with('success', "Клетка с индексом $id успешно отредактирована.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $cage = Cage::findOrFail($id);
        if (Animal::where('cage_id', $cage->id)->exists()) {
            return redirect()->route('cages.index')->withErrors("В клетке с индексом $id ещё проживают животные!");
        }
        $cage->delete();
        return redirect()->route('cages.index')->with('success', "Клетка с индексом $id успешно удалена.");
    }
}
