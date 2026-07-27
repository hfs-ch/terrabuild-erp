<?php

namespace App\Http\Controllers;

use App\Models\Chantier;
use App\Models\Client;
use App\Models\Devis;
use App\Models\Document;
use App\Models\Employe;
use App\Models\Equipe;
use App\Models\Facture;
use App\Models\Fournisseur;
use App\Models\Materiel;
use App\Models\Paiement;
use App\Models\Presence;
use App\Models\Projet;
use App\Models\Salaire;
use App\Models\Stock;
use App\Models\Tache;
use App\Models\Vehicule;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $projetStats = Projet::select('statut', DB::raw('count(*) as total'))
            ->groupBy('statut')
            ->pluck('total', 'statut')
            ->toArray();

        $factureStats = Facture::select('statut', DB::raw('count(*) as total'))
            ->groupBy('statut')
            ->pluck('total', 'statut')
            ->toArray();

        $paiementStats = Paiement::select(
                DB::raw('DATE_FORMAT(date_paiement, "%Y-%m") as mois'),
                DB::raw('SUM(montant) as total')
            )
            ->groupBy('mois')
            ->orderBy('mois')
            ->get()
            ->mapWithKeys(fn ($item) => [$item->mois => (float) $item->total])
            ->toArray();

        return view('dashboard', [
            'employes' => Employe::count(),
            'clients' => Client::count(),
            'projets' => Projet::count(),
            'chantiers' => Chantier::count(),
            'equipes' => Equipe::count(),
            'fournisseurs' => Fournisseur::count(),
            'vehicules' => Vehicule::count(),
            'taches' => Tache::count(),
            'presences' => Presence::count(),
            'salaires' => Salaire::count(),
            'devis' => Devis::count(),
            'factures' => Facture::count(),
            'paiements' => Paiement::count(),
            'documents' => Document::count(),
            'materiels' => Materiel::count(),
            'stock_total' => (int) Stock::sum('quantite'),
            'stock_value' => (float) Stock::join('materiels', 'stocks.materiel_id', '=', 'materiels.id')
                ->sum(DB::raw('stocks.quantite * materiels.prix_unitaire')),
            'factures_impayees' => Facture::where('statut', '!=', 'Payée')->count(),
            'paiements_recus' => (float) Paiement::sum('montant'),
            'projetStats' => $projetStats,
            'factureStats' => $factureStats,
            'paiementStats' => $paiementStats,
        ]);
    }
}
