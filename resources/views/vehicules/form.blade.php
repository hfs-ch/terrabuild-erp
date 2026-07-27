<div class="mb-3">
    <label class="form-label">Immatriculation</label>
    <input type="text" name="immatriculation" class="form-control" value="{{ old('immatriculation', $vehicule->immatriculation ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Marque</label>
    <input type="text" name="marque" class="form-control" value="{{ old('marque', $vehicule->marque ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Modèle</label>
    <input type="text" name="modele" class="form-control" value="{{ old('modele', $vehicule->modele ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Type</label>
    <input type="text" name="type" class="form-control" value="{{ old('type', $vehicule->type ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Chauffeur</label>
    <input type="text" name="chauffeur" class="form-control" value="{{ old('chauffeur', $vehicule->chauffeur ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Statut</label>
    <select name="statut" class="form-control" required>
        <option value="Disponible" @selected(old('statut', $vehicule->statut ?? '') === 'Disponible')>Disponible</option>
        <option value="En service" @selected(old('statut', $vehicule->statut ?? '') === 'En service')>En service</option>
        <option value="Hors service" @selected(old('statut', $vehicule->statut ?? '') === 'Hors service')>Hors service</option>
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Chantier</label>
    <select name="chantier_id" class="form-control">
        <option value="">-- Aucun --</option>
        @foreach($chantiers as $chantier)
            <option value="{{ $chantier->id }}" @selected(old('chantier_id', $vehicule->chantier_id ?? '') == $chantier->id)>{{ $chantier->nom }}</option>
        @endforeach
    </select>
</div>
<button class="btn btn-success"><i class="fas fa-save"></i> Enregistrer</button>
<a href="{{ route('vehicules.index') }}" class="btn btn-secondary">Retour</a>
