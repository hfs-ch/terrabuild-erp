<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Devis;
use App\Models\Facture;
use App\Models\FactureLigne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FactureController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $factures = Facture::query()
            ->with(['client', 'devis'])
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('reference', 'like', "%{$search}%")
                        ->orWhere('statut', 'like', "%{$search}%")
                        ->orWhere('date_echeance', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->appends(['search' => $search]);

        return view('factures.index', compact('factures', 'search'));
    }

    public function create()
{
    $facture = new Facture();

    $clients = Client::orderBy('nom')->get();

    $devis = Devis::orderBy('reference')->get();

    return view('factures.create', compact(
        'facture',
        'clients',
        'devis'
    ));
}

    public function store(Request $request)
{
    $validated = $request->validate([
        'client_id' => 'required|exists:clients,id',
        'devis_id' => 'nullable|exists:devis,id',
        'reference' => 'required|string|max:255|unique:factures,reference',

        'date_emission' => 'required|date',
        'date_echeance' => 'required|date',

        'sous_total' => 'required|numeric',
        'montant_tva' => 'required|numeric',
        'remise' => 'nullable|numeric',
        'montant_ttc' => 'required|numeric',

        'statut' => 'required|in:Payée,Partiellement payée,Impayée',

        'designation.*' => 'required|string',
        'quantite.*' => 'required|numeric|min:1',
        'prix_unitaire.*' => 'required|numeric|min:0',
        'tva.*' => 'required|numeric|min:0',
    ]);

    $facture = Facture::create([
        'client_id' => $validated['client_id'],
        'devis_id' => $validated['devis_id'] ?? null,
        'reference' => $validated['reference'],
        'date_emission' => $validated['date_emission'],
        'date_echeance' => $validated['date_echeance'],
        'sous_total' => $validated['sous_total'],
        'montant_ht' => $validated['sous_total'],
        'montant_tva' => $validated['montant_tva'],
        'remise' => $validated['remise'] ?? 0,
        'montant_ttc' => $validated['montant_ttc'],
        'statut' => $validated['statut'],
    ]);

    foreach ($request->designation as $i => $designation) {

        $qte = $request->quantite[$i];
        $prix = $request->prix_unitaire[$i];
        $tva = $request->tva[$i];

        $ht = $qte * $prix;
        $ttc = $ht + ($ht * $tva / 100);

        FactureLigne::create([
            'facture_id' => $facture->id,
            'designation' => $designation,
            'quantite' => $qte,
            'prix_unitaire' => $prix,
            'tva' => $tva,
            'total_ht' => $ht,
            'total_ttc' => $ttc,
        ]);
    }

    return redirect()->route('factures.index')
        ->with('success', 'Facture créée avec succès.');
}


   public function show(Facture $facture)
{
    $facture->load([
    'client',
    'devis',
    'lignes'
]);

    return view('factures.show', compact('facture'));
}

   public function edit(Facture $facture)
{
    $clients = Client::orderBy('nom')->get();

    $devis = Devis::orderBy('reference')->get();

    $facture->load('lignes');

    return view('factures.edit', compact(
        'facture',
        'clients',
        'devis'
    ));
}
   public function update(Request $request, Facture $facture)
{
    $request->validate([

        'client_id'=>'required',

        'reference'=>'required|unique:factures,reference,'.$facture->id,

        'date_emission'=>'required',

        'date_echeance'=>'required',

        'statut'=>'required',

        'designation'=>'required|array',

        'designation.*'=>'required',

        'quantite'=>'required|array',

        'prix_unitaire'=>'required|array',

        'tva_ligne'=>'required|array'

    ]);

    DB::transaction(function() use($request,$facture){

        $facture->update([

            'client_id'=>$request->client_id,

            'devis_id'=>$request->devis_id,

            'reference'=>$request->reference,

            'date_emission'=>$request->date_emission,

            'date_echeance'=>$request->date_echeance,

            'sous_total'=>$request->sous_total,

            'remise'=>$request->remise,

            'montant_tva'=>$request->montant_tva,

            'montant_ht'=>$request->montant_ht,

            'tva'=>$request->montant_tva,

            'montant_ttc'=>$request->montant_ttc,

            'statut'=>$request->statut

        ]);

        $facture->lignes()->delete();

        foreach($request->designation as $i=>$designation){

            FactureLigne::create([

                'facture_id'=>$facture->id,

                'designation'=>$designation,

                'quantite'=>$request->quantite[$i],

                'prix_unitaire'=>$request->prix_unitaire[$i],

                'tva'=>$request->tva_ligne[$i],

                'total_ht'=>$request->total_ht_ligne[$i],

                'total_ttc'=>$request->total_ttc_ligne[$i]

            ]);

        }

    });

    return redirect()
        ->route('factures.index')
        ->with('success','Facture modifiée avec succès');
}

public function print(Facture $facture)
{
    $facture->load(['client','lignes']);

    return view('factures.print', compact('facture'));
}



    public function destroy(Facture $facture)
    {
        $facture->delete();

        return redirect()->route('factures.index')->with('success', 'Facture supprimée avec succès.');
    }
}
