<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Presence;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $presences = Presence::query()
            ->with('employe')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('date_presence', 'like', "%{$search}%")
                        ->orWhere('statut', 'like', "%{$search}%")
                        ->orWhere('commentaire', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->appends(['search' => $search]);

        return view('presences.index', compact('presences', 'search'));
    }

    public function create()
    {
        $presence = new Presence();
        $employes = Employe::orderBy('nom')->get();

        return view('presences.create', compact('presence', 'employes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employe_id' => ['required', 'exists:employes,id'],
            'date_presence' => ['required', 'date'],
            'heure_entree' => ['nullable', 'date_format:H:i'],
            'heure_sortie' => ['nullable', 'date_format:H:i'],
            'statut' => ['required', 'in:Présent,Absent,Retard,Conge'],
            'commentaire' => ['nullable', 'string'],
        ]);

        Presence::create($validated);

        return redirect()->route('presences.index')->with('success', 'Présence enregistrée avec succès.');
    }

    public function show(Presence $presence)
    {
        return view('presences.show', compact('presence'));
    }

    public function edit(Presence $presence)
    {
        $employes = Employe::orderBy('nom')->get();

        return view('presences.edit', compact('presence', 'employes'));
    }

    public function update(Request $request, Presence $presence)
    {
        $validated = $request->validate([
            'employe_id' => ['required', 'exists:employes,id'],
            'date_presence' => ['required', 'date'],
            'heure_entree' => ['nullable', 'date_format:H:i'],
            'heure_sortie' => ['nullable', 'date_format:H:i'],
            'statut' => ['required', 'in:Présent,Absent,Retard,Conge'],
            'commentaire' => ['nullable', 'string'],
        ]);

        $presence->update($validated);

        return redirect()->route('presences.index')->with('success', 'Présence mise à jour avec succès.');
    }

    public function destroy(Presence $presence)
    {
        $presence->delete();

        return redirect()->route('presences.index')->with('success', 'Présence supprimée avec succès.');
    }
}
