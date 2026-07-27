<?php

namespace App\Http\Controllers;

use App\Models\Chantier;
use App\Models\Projet;
use Illuminate\Http\Request;

class ChantierController extends Controller
{
    public function index()
    {
        $chantiers = Chantier::with('projet')
                        ->latest()
                        ->paginate(10);

        return view('chantiers.index', compact('chantiers'));
    }

    public function create()
    {
        $projets = Projet::orderBy('nom')->get();

        return view('chantiers.create', compact('projets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reference'=>'required|unique:chantiers',
            'nom'=>'required',
            'adresse'=>'required',
            'date_debut'=>'required|date',
            'date_fin'=>'nullable|date',
            'budget'=>'required|numeric',
            'statut'=>'required',
            'projet_id'=>'required|exists:projets,id',
        ]);

        Chantier::create($request->all());

        return redirect()
            ->route('chantiers.index')
            ->with('success','Chantier ajouté avec succès.');
    }

    public function show(Chantier $chantier)
    {
        return view('chantiers.show', compact('chantier'));
    }

    public function edit(Chantier $chantier)
    {
        $projets = Projet::orderBy('nom')->get();

        return view('chantiers.edit', compact('chantier','projets'));
    }

    public function update(Request $request, Chantier $chantier)
    {
        $request->validate([
            'reference'=>'required|unique:chantiers,reference,'.$chantier->id,
            'nom'=>'required',
            'adresse'=>'required',
            'date_debut'=>'required|date',
            'date_fin'=>'nullable|date',
            'budget'=>'required|numeric',
            'statut'=>'required',
            'projet_id'=>'required|exists:projets,id',
        ]);

        $chantier->update($request->all());

        return redirect()
            ->route('chantiers.index')
            ->with('success','Chantier modifié avec succès.');
    }

    public function destroy(Chantier $chantier)
    {
        $chantier->delete();

        return redirect()
            ->route('chantiers.index')
            ->with('success','Chantier supprimé.');
    }
}