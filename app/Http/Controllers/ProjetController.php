<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Projet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    public function index()
    {
        $projets = Projet::with('client')
            ->latest()
            ->paginate(10);

        return view('projets.index', compact('projets'));
    }

    public function create()
    {
        $clients = Client::orderBy('nom')->get();

        return view('projets.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom'=>'required',
            'description'=>'nullable',
            'budget'=>'required|numeric',
            'date_debut'=>'required|date',
            'date_fin'=>'nullable|date',
            'statut'=>'required',
            'client_id'=>'required|exists:clients,id',
        ]);

        Projet::create($request->all());

        return redirect()
            ->route('projets.index')
            ->with('success','Projet créé avec succès');
    }

    public function show(Projet $projet)
    {
        return view('projets.show',compact('projet'));
    }

    public function edit(Projet $projet)
    {
        $clients = Client::orderBy('nom')->get();

        return view('projets.edit',compact('projet','clients'));
    }

    public function update(Request $request, Projet $projet)
    {
        $request->validate([
            'nom'=>'required',
            'description'=>'nullable',
            'budget'=>'required|numeric',
            'date_debut'=>'required|date',
            'date_fin'=>'nullable|date',
            'statut'=>'required',
            'client_id'=>'required|exists:clients,id',
        ]);

        $projet->update($request->all());

        return redirect()
            ->route('projets.index')
            ->with('success','Projet modifié');
    }

    public function destroy(Projet $projet)
    {
        $projet->delete();

        return redirect()
            ->route('projets.index')
            ->with('success','Projet supprimé');
    }
}