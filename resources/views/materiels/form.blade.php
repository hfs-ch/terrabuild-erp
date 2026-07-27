<div class="mb-3">
    <label class="form-label">Nom</label>

    <input
        type="text"
        name="nom"
        class="form-control"
        value="{{ old('nom', $materiel->nom ?? '') }}"
        required>
</div>

<div class="mb-3">
    <label class="form-label">Catégorie</label>

    <input
        type="text"
        name="categorie"
        class="form-control"
        value="{{ old('categorie', $materiel->categorie ?? '') }}"
        required>
</div>

<div class="mb-3">
    <label class="form-label">Marque</label>

    <input
        type="text"
        name="marque"
        class="form-control"
        value="{{ old('marque', $materiel->marque ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Quantité</label>

    <input
        type="number"
        name="quantite"
        class="form-control"
        value="{{ old('quantite', $materiel->quantite ?? 0) }}"
        required>
</div>

<div class="mb-3">

    <label class="form-label">État</label>

    <select
        name="etat"
        class="form-control">

        <option value="Disponible"
            @selected(old('etat',$materiel->etat ?? '')=='Disponible')>
            Disponible
        </option>

        <option value="En service"
            @selected(old('etat',$materiel->etat ?? '')=='En service')>
            En service
        </option>

        <option value="Maintenance"
            @selected(old('etat',$materiel->etat ?? '')=='Maintenance')>
            Maintenance
        </option>

    </select>

</div>

<div class="mb-3">

    <label class="form-label">Chantier</label>

    <select
        name="chantier_id"
        class="form-control">

        <option value="">Aucun chantier</option>

        @foreach($chantiers as $chantier)

        <option
            value="{{ $chantier->id }}"
            @selected(old('chantier_id',$materiel->chantier_id ?? '')==$chantier->id)>

            {{ $chantier->nom }}

        </option>

        @endforeach

    </select>

</div>

<div class="mb-3">

    <label class="form-label">Description</label>

    <textarea
        name="description"
        class="form-control"
        rows="4">{{ old('description',$materiel->description ?? '') }}</textarea>

</div>

<button class="btn btn-success">

    <i class="fas fa-save"></i>

    Enregistrer

</button>

<a href="{{ route('materiels.index') }}"
   class="btn btn-secondary">

    Retour

</a>