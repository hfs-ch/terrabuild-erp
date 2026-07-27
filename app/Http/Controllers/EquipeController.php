<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Chantier;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipes = Equipe::with('chantier')
            ->latest()
            ->paginate(10);

        return view('equipes.index', compact('equipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $chantiers = Chantier::orderBy('nom')->get();

        return view('equipes.create', compact('chantiers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|max:255',
            'chef_equipe' => 'nullable|max:255',
            'description' => 'nullable',
            'chantier_id' => 'required|exists:chantiers,id',
        ]);

        Equipe::create($request->all());

        return redirect()
            ->route('equipes.index')
            ->with('success', 'Équipe ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipe $equipe)
    {
        return view('equipes.show', compact('equipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipe $equipe)
    {
        $chantiers = Chantier::orderBy('nom')->get();

        return view('equipes.edit', compact('equipe', 'chantiers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipe $equipe)
    {
        $request->validate([
            'nom' => 'required|max:255',
            'chef_equipe' => 'nullable|max:255',
            'description' => 'nullable',
            'chantier_id' => 'required|exists:chantiers,id',
        ]);

        $equipe->update($request->all());

        return redirect()
            ->route('equipes.index')
            ->with('success', 'Équipe modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipe $equipe)
    {
        $equipe->delete();

        return redirect()
            ->route('equipes.index')
            ->with('success', 'Équipe supprimée avec succès.');
    }
}