<?php

namespace App\Http\Controllers;

use App\Models\Chantier;
use App\Models\Document;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $documents = Document::query()
            ->with(['projet', 'chantier'])
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nom', 'like', "%{$search}%")
                        ->orWhere('type', 'like', "%{$search}%")
                        ->orWhere('categorie', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->appends(['search' => $search]);

        return view('documents.index', compact('documents', 'search'));
    }

    public function create()
    {
        $projets = Projet::orderBy('nom')->get();
        $chantiers = Chantier::orderBy('nom')->get();

        return view('documents.create', compact('projets', 'chantiers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'projet_id' => ['nullable', 'exists:projets,id'],
            'chantier_id' => ['nullable', 'exists:chantiers,id'],
            'type' => ['required', 'in:PDF,Image,Plan,Contrat'],
            'nom' => ['required', 'string', 'max:255'],
            'categorie' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'fichier' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png,doc,docx'],
        ]);

        $path = $request->file('fichier')->store('documents', 'local');

        Document::create([
            'projet_id' => $validated['projet_id'] ?? null,
            'chantier_id' => $validated['chantier_id'] ?? null,
            'type' => $validated['type'],
            'nom' => $validated['nom'],
            'categorie' => $validated['categorie'] ?? null,
            'description' => $validated['description'] ?? null,
            'chemin' => $path,
        ]);

        return redirect()->route('documents.index')->with('success', 'Document ajouté avec succès.');
    }

    public function show(Document $document)
    {
        return view('documents.show', compact('document'));
    }

    public function edit(Document $document)
    {
        $projets = Projet::orderBy('nom')->get();
        $chantiers = Chantier::orderBy('nom')->get();

        return view('documents.edit', compact('document', 'projets', 'chantiers'));
    }

    public function update(Request $request, Document $document)
    {
        $validated = $request->validate([
            'projet_id' => ['nullable', 'exists:projets,id'],
            'chantier_id' => ['nullable', 'exists:chantiers,id'],
            'type' => ['required', 'in:PDF,Image,Plan,Contrat'],
            'nom' => ['required', 'string', 'max:255'],
            'categorie' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'fichier' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png,doc,docx'],
        ]);

        if ($request->hasFile('fichier')) {
            Storage::disk('local')->delete($document->chemin);
            $validated['chemin'] = $request->file('fichier')->store('documents', 'local');
        }

        $document->update($validated);

        return redirect()->route('documents.index')->with('success', 'Document mis à jour avec succès.');
    }

    public function destroy(Document $document)
    {
        Storage::disk('local')->delete($document->chemin);
        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Document supprimé avec succès.');
    }

    public function download(Document $document)
    {
        return Storage::disk('local')->download($document->chemin, $document->nom);
    }
}
