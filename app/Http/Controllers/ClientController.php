<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->paginate(10);

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'telephone' => 'required|string|max:30',
        'email' => 'nullable|email|max:255',
        'adresse' => 'nullable|string',
        'ville' => 'nullable|string|max:255',
    ]);

    Client::create($validated);

    return redirect()
        ->route('clients.index')
        ->with('success', 'Client ajouté avec succès');
}

    public function show(Client $client)
    {
        return view('clients.show',compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit',compact('client'));
    }

    public function update(Request $request, Client $client)
{
    $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'telephone' => 'required|string|max:30',
        'email' => 'nullable|email|max:255',
        'adresse' => 'nullable|string',
        'ville' => 'nullable|string|max:255',
    ]);

    $client->update($validated);

    return redirect()
        ->route('clients.index')
        ->with('success', 'Client modifié');
}

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')
            ->with('success','Client supprimé');
    }
}