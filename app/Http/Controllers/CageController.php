<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCageRequest;
use App\Http\Requests\UpdateCageRequest;
use App\Models\Cage;
use Illuminate\Http\Request;

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
     * Store a newly created resource in storage.
     */
    public function store(StoreCageRequest $request)
    {
        //
        Cage::create($request->validated());
        return redirect()->route('cages.index')->with('success', 'Cage created successfully.');
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
        $cage->update($request->validated());
        return redirect()->route('cages.index')->with('success', 'Cage updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $cage = Cage::findOrFail($id);
        $cage->delete();
        return redirect()->route('cages.index')->with('success', 'Cage deleted successfully.');
    }
}
