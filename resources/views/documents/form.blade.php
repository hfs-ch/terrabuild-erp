<div class="mb-3">
    <label class="form-label">Nom</label>
    <input type="text"
           name="nom"
           class="form-control"
           value="{{ old('nom',$document->nom ?? '') }}"
           required>
</div>

<div class="mb-3">
    <label class="form-label">Type</label>

    <select name="type" class="form-control" required>

        <option value="PDF" @selected(old('type',$document->type ?? '')=='PDF')>PDF</option>

        <option value="Image" @selected(old('type',$document->type ?? '')=='Image')>Image</option>

        <option value="Plan" @selected(old('type',$document->type ?? '')=='Plan')>Plan</option>

        <option value="Contrat" @selected(old('type',$document->type ?? '')=='Contrat')>Contrat</option>

    </select>
</div>

<div class="mb-3">
    <label class="form-label">Projet</label>

    <select name="projet_id" class="form-control">

        <option value="">-- Aucun --</option>

        @foreach($projets as $projet)

        <option value="{{ $projet->id }}"
            @selected(old('projet_id',$document->projet_id ?? '')==$projet->id)>
            {{ $projet->nom }}
        </option>

        @endforeach

    </select>
</div>

<div class="mb-3">
    <label class="form-label">Chantier</label>

    <select name="chantier_id" class="form-control">

        <option value="">-- Aucun --</option>

        @foreach($chantiers as $chantier)

        <option value="{{ $chantier->id }}"
            @selected(old('chantier_id',$document->chantier_id ?? '')==$chantier->id)>
            {{ $chantier->nom }}
        </option>

        @endforeach

    </select>
</div>

<div class="mb-3">
    <label class="form-label">Catégorie</label>

    <input type="text"
           name="categorie"
           class="form-control"
           value="{{ old('categorie',$document->categorie ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Fichier</label>

    <input type="file"
           name="fichier"
           class="form-control">
</div>

<div class="mb-3">
    <label class="form-label">Description</label>

    <textarea
        name="description"
        class="form-control">{{ old('description',$document->description ?? '') }}</textarea>
</div>

<button class="btn btn-success">
    <i class="fas fa-save"></i> Enregistrer
</button>

<a href="{{ route('documents.index') }}" class="btn btn-secondary">
    Retour
</a>