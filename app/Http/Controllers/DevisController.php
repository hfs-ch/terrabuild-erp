<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Devis;
use Illuminate\Http\Request;
use App\Models\Projet;

class DevisController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $devis = Devis::query()
            ->with('client')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('reference', 'like', "%{$search}%")
                        ->orWhere('statut', 'like', "%{$search}%")
                        ->orWhere('montant_ttc', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->appends(['search' => $search]);

        return view('devis.index', compact('devis', 'search'));
    }

    public function create()
{
    $devis = new Devis();

    $clients = Client::orderBy('nom')->get();

    $projets = Projet::orderBy('nom')->get();

    return view('devis.create', compact(
        'devis',
        'clients',
        'projets'
    ));
}

    public function store(Request $request)
    {
        $validated = $request->validate([
    'client_id' => 'required|exists:clients,id',
    'projet_id' => 'nullable|exists:projets,id',

    'reference' => 'required|string|max:255|unique:devis,reference',

    'date_emission' => 'required|date',
    'date_validite' => 'required|date',

    'montant_ht' => 'required|numeric',
    'tva' => 'required|numeric',
    'montant_ttc' => 'required|numeric',

    'statut' => 'required|in:Soumis,Accepté,Refusé',
]);

        Devis::create($validated);

        return redirect()->route('devis.index')->with('success', 'Devis ajouté avec succès.');
    }

    public function show(Devis $devis)
    {
        return view('devis.show', compact('devis'));
    }

    public function edit(Devis $devis)
{
    $clients = Client::orderBy('nom')->get();

    $projets = Projet::orderBy('nom')->get();

    return view('devis.edit', compact(
        'devis',
        'clients',
        'projets'
    ));
}

    public function update(Request $request, Devis $devis)
    {
       $validated = $request->validate([
    'client_id' => 'required|exists:clients,id',
    'projet_id' => 'nullable|exists:projets,id',

    'reference' => 'required|string|max:255|unique:devis,reference,' . $devis->id,

    'date_emission' => 'required|date',
    'date_validite' => 'required|date',

    'montant_ht' => 'required|numeric',
    'tva' => 'required|numeric',
    'montant_ttc' => 'required|numeric',

    'statut' => 'required|in:Soumis,Accepté,Refusé',
]);
        $devis->update($validated);

        return redirect()->route('devis.index')->with('success', 'Devis mis à jour avec succès.');
    }

    public function destroy(Devis $devis)
    {
        $devis->delete();

        return redirect()->route('devis.index')->with('success', 'Devis supprimé avec succès.');
    }
}
