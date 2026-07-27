<?php

namespace App\Http\Controllers;

use App\Models\Chantier;
use App\Models\Employe;
use App\Models\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $taches = Tache::query()
            ->with(['chantier', 'employe'])
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('titre', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhere('statut', 'like', "%{$search}%")
                        ->orWhere('priorite', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->appends(['search' => $search]);

        return view('taches.index', compact('taches', 'search'));
    }

    public function create()
    {
        $tache = new Tache();
        $chantiers = Chantier::orderBy('nom')->get();
        $employes = Employe::orderBy('nom')->get();

        return view('taches.create', compact('tache', 'chantiers', 'employes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'chantier_id' => ['required', 'exists:chantiers,id'],
            'employe_id' => ['nullable', 'exists:employes,id'],
            'titre' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'date_debut' => ['required', 'date'],
            'date_fin' => ['nullable', 'date', 'after_or_equal:date_debut'],
            'statut' => ['required', 'in:À faire,En cours,Terminée,Annulée'],
            'priorite' => ['required', 'in:Basse,Moyenne,Haute'],
        ]);

        Tache::create($validated);

        return redirect()->route('taches.index')->with('success', 'Tâche ajoutée avec succès.');
    }

    public function show(Tache $tache)
    {
        return view('taches.show', compact('tache'));
    }

    public function edit(Tache $tache)
    {
        $chantiers = Chantier::orderBy('nom')->get();
        $employes = Employe::orderBy('nom')->get();

        return view('taches.edit', compact('tache', 'chantiers', 'employes'));
    }

    public function update(Request $request, Tache $tache)
    {
        $validated = $request->validate([
            'chantier_id' => ['required', 'exists:chantiers,id'],
            'employe_id' => ['nullable', 'exists:employes,id'],
            'titre' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'date_debut' => ['required', 'date'],
            'date_fin' => ['nullable', 'date', 'after_or_equal:date_debut'],
            'statut' => ['required', 'in:À faire,En cours,Terminée,Annulée'],
            'priorite' => ['required', 'in:Basse,Moyenne,Haute'],
        ]);

        $tache->update($validated);

        return redirect()->route('taches.index')->with('success', 'Tâche mise à jour avec succès.');
    }

    public function destroy(Tache $tache)
    {
        $tache->delete();

        return redirect()->route('taches.index')->with('success', 'Tâche supprimée avec succès.');
    }
}
