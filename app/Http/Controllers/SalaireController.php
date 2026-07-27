<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Salaire;
use Illuminate\Http\Request;

class SalaireController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $salaires = Salaire::query()
            ->with('employe')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('mois', 'like', "%{$search}%")
                        ->orWhere('statut', 'like', "%{$search}%")
                        ->orWhere('net_a_payer', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->appends(['search' => $search]);

        return view('salaires.index', compact('salaires', 'search'));
    }

    public function create()
    {
        $employes = Employe::orderBy('nom')->get();

        return view('salaires.create', compact('employes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employe_id' => ['required', 'exists:employes,id'],
            'mois' => ['required', 'string', 'max:50'],
            'base_salaire' => ['required', 'numeric', 'min:0'],
            'prime' => ['nullable', 'numeric', 'min:0'],
            'deductions' => ['nullable', 'numeric', 'min:0'],
            'net_a_payer' => ['required', 'numeric', 'min:0'],
            'statut' => ['required', 'in:Payé,En attente,Différé'],
        ]);

        Salaire::create($validated);

        return redirect()->route('salaires.index')->with('success', 'Salaire ajouté avec succès.');
    }

    public function show(Salaire $salaire)
    {
        return view('salaires.show', compact('salaire'));
    }

    public function edit(Salaire $salaire)
    {
        $employes = Employe::orderBy('nom')->get();

        return view('salaires.edit', compact('salaire', 'employes'));
    }

    public function update(Request $request, Salaire $salaire)
    {
        $validated = $request->validate([
            'employe_id' => ['required', 'exists:employes,id'],
            'mois' => ['required', 'string', 'max:50'],
            'base_salaire' => ['required', 'numeric', 'min:0'],
            'prime' => ['nullable', 'numeric', 'min:0'],
            'deductions' => ['nullable', 'numeric', 'min:0'],
            'net_a_payer' => ['required', 'numeric', 'min:0'],
            'statut' => ['required', 'in:Payé,En attente,Différé'],
        ]);

        $salaire->update($validated);

        return redirect()->route('salaires.index')->with('success', 'Salaire mis à jour avec succès.');
    }

    public function destroy(Salaire $salaire)
    {
        $salaire->delete();

        return redirect()->route('salaires.index')->with('success', 'Salaire supprimé avec succès.');
    }
}
