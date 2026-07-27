<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Materiel;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::with('materiel')
            ->latest()
            ->paginate(10);

        return view('stocks.index', compact('stocks'));
    }

    public function create()
    {
        $materiels = Materiel::orderBy('nom')->get();

        return view('stocks.create', compact('materiels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'materiel_id' => 'required|exists:materiels,id',
            'type' => 'required|in:Entrée,Sortie',
            'quantite' => 'required|integer|min:1',
            'date_mouvement' => 'required|date',
            'reference' => 'nullable|max:255',
            'observation' => 'nullable',
        ]);

        Stock::create($request->all());

        return redirect()
            ->route('stocks.index')
            ->with('success', 'Mouvement de stock ajouté avec succès.');
    }

    public function show(Stock $stock)
    {
        return view('stocks.show', compact('stock'));
    }

    public function edit(Stock $stock)
    {
        $materiels = Materiel::orderBy('nom')->get();

        return view('stocks.edit', compact('stock', 'materiels'));
    }

    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'materiel_id' => 'required|exists:materiels,id',
            'type' => 'required|in:Entrée,Sortie',
            'quantite' => 'required|integer|min:1',
            'date_mouvement' => 'required|date',
            'reference' => 'nullable|max:255',
            'observation' => 'nullable',
        ]);

        $stock->update($request->all());

        return redirect()
            ->route('stocks.index')
            ->with('success', 'Mouvement de stock modifié.');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();

        return redirect()
            ->route('stocks.index')
            ->with('success', 'Mouvement supprimé.');
    }
}