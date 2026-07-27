<?php

namespace App\Http\Controllers;

use App\Models\Materiel;
use App\Models\Chantier;
use Illuminate\Http\Request;

class MaterielController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materiels = Materiel::with('chantier')
            ->latest()
            ->paginate(10);

        return view('materiels.index', compact('materiels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $chantiers = Chantier::orderBy('nom')->get();

        return view('materiels.create', compact('chantiers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|max:255',
            'categorie' => 'required|max:255',
            'marque' => 'nullable|max:255',
            'quantite' => 'required|integer|min:0',
            'etat' => 'required',
            'description' => 'nullable',
            'chantier_id' => 'nullable|exists:chantiers,id',
        ]);

        Materiel::create($request->all());

        return redirect()
            ->route('materiels.index')
            ->with('success', 'Matériel ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materiel $materiel)
    {
        return view('materiels.show', compact('materiel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materiel $materiel)
    {
        $chantiers = Chantier::orderBy('nom')->get();

        return view('materiels.edit', compact('materiel', 'chantiers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materiel $materiel)
    {
        $request->validate([
            'nom' => 'required|max:255',
            'categorie' => 'required|max:255',
            'marque' => 'nullable|max:255',
            'quantite' => 'required|integer|min:0',
            'etat' => 'required',
            'description' => 'nullable',
            'chantier_id' => 'nullable|exists:chantiers,id',
        ]);

        $materiel->update($request->all());

        return redirect()
            ->route('materiels.index')
            ->with('success', 'Matériel modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materiel $materiel)
    {
        $materiel->delete();

        return redirect()
            ->route('materiels.index')
            ->with('success', 'Matériel supprimé avec succès.');
    }
}