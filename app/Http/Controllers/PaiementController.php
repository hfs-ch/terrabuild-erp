<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Facture;
use App\Models\Paiement;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $paiements = Paiement::query()
            ->with(['client', 'facture'])
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('montant', 'like', "%{$search}%")
                        ->orWhere('mode', 'like', "%{$search}%")
                        ->orWhere('statut', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->appends(['search' => $search]);

        return view('paiements.index', compact('paiements', 'search'));
    }

    public function create()
    {
        $paiement = new Paiement();
        $clients = Client::orderBy('nom')->get();
        $factures = Facture::orderBy('reference')->get();

        return view('paiements.create', compact('paiement', 'clients', 'factures'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'facture_id' => ['required', 'exists:factures,id'],
            'client_id' => ['required', 'exists:clients,id'],
            'montant' => ['required', 'numeric', 'min:0'],
            'date_paiement' => ['required', 'date'],
            'mode' => ['required', 'in:Espèces,Chèque,Virement,Carte'],
            'statut' => ['required', 'in:Reçu,En attente,Annulé'],
        ]);

        Paiement::create($validated);

        return redirect()->route('paiements.index')->with('success', 'Paiement enregistré avec succès.');
    }

    public function show(Paiement $paiement)
    {
        return view('paiements.show', compact('paiement'));
    }

    public function edit(Paiement $paiement)
    {
        $clients = Client::orderBy('nom')->get();
        $factures = Facture::orderBy('reference')->get();

        return view('paiements.edit', compact('paiement', 'clients', 'factures'));
    }

    public function update(Request $request, Paiement $paiement)
    {
        $validated = $request->validate([
            'facture_id' => ['required', 'exists:factures,id'],
            'client_id' => ['required', 'exists:clients,id'],
            'montant' => ['required', 'numeric', 'min:0'],
            'date_paiement' => ['required', 'date'],
            'mode' => ['required', 'in:Espèces,Chèque,Virement,Carte'],
            'statut' => ['required', 'in:Reçu,En attente,Annulé'],
        ]);

        $paiement->update($validated);

        return redirect()->route('paiements.index')->with('success', 'Paiement mis à jour avec succès.');
    }

    public function destroy(Paiement $paiement)
    {
        $paiement->delete();

        return redirect()->route('paiements.index')->with('success', 'Paiement supprimé avec succès.');
    }
}
