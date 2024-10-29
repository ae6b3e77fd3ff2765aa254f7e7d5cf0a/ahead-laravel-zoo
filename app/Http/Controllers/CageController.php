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
        $cages = Cage::all();
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
        Cage::create($request->validated());
        return redirect()->route('cages.index')->with('success', 'Новая клетка успешно создана.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $cage = Cage::with('animals')->findOrFail($id);
        return view('cages.show', compact('cage'));
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
        if ($data->size < $cage->size) {
            return redirect()->route('cages.edit')->withErrors('Размер клетки меньше, чем в ней проживает животных.');
        }
        $cage->update($data);
        return redirect()->route('cages.index')->with('success', 'Информация о клетке успешно обновлена.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $cage = Cage::findOrFail($id);
        if (Animal::where('cage_id', $cage->id)->exists()) {
            return redirect()->route('cages.index')->withErrors('В клетке проживают животные.');
        }
        $cage->delete();
        return redirect()->route('cages.index')->with('success', 'Информация о клетке успешно удалена.');
    }
}
