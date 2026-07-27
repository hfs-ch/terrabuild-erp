<?php

namespace App\Http\Controllers;

use App\Models\Chantier;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $vehicules = Vehicule::query()
            ->with('chantier')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('immatriculation', 'like', "%{$search}%")
                        ->orWhere('marque', 'like', "%{$search}%")
                        ->orWhere('modele', 'like', "%{$search}%")
                        ->orWhere('chauffeur', 'like', "%{$search}%")
                        ->orWhere('type', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->appends(['search' => $search]);

        return view('vehicules.index', compact('vehicules', 'search'));
    }

    public function create()
    {
        $chantiers = Chantier::orderBy('nom')->get();

        return view('vehicules.create', compact('chantiers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'immatriculation' => ['required', 'string', 'max:50', 'unique:vehicules,immatriculation'],
            'marque' => ['required', 'string', 'max:255'],
            'modele' => ['nullable', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'chauffeur' => ['nullable', 'string', 'max:255'],
            'statut' => ['required', 'in:Disponible,En service,Hors service'],
            'chantier_id' => ['nullable', 'exists:chantiers,id'],
        ]);

        Vehicule::create($validated);

        return redirect()->route('vehicules.index')->with('success', 'Véhicule ajouté avec succès.');
    }

    public function show(Vehicule $vehicule)
    {
        return view('vehicules.show', compact('vehicule'));
    }

    public function edit(Vehicule $vehicule)
    {
        $chantiers = Chantier::orderBy('nom')->get();

        return view('vehicules.edit', compact('vehicule', 'chantiers'));
    }

    public function update(Request $request, Vehicule $vehicule)
    {
        $validated = $request->validate([
            'immatriculation' => ['required', 'string', 'max:50', 'unique:vehicules,immatriculation,' . $vehicule->id],
            'marque' => ['required', 'string', 'max:255'],
            'modele' => ['nullable', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'chauffeur' => ['nullable', 'string', 'max:255'],
            'statut' => ['required', 'in:Disponible,En service,Hors service'],
            'chantier_id' => ['nullable', 'exists:chantiers,id'],
        ]);

        $vehicule->update($validated);

        return redirect()->route('vehicules.index')->with('success', 'Véhicule mis à jour avec succès.');
    }

    public function destroy(Vehicule $vehicule)
    {
        $vehicule->delete();

        return redirect()->route('vehicules.index')->with('success', 'Véhicule supprimé avec succès.');
    }
}
