<div class="mb-3">
    <label class="form-label">Nom</label>
    <input type="text" name="nom" class="form-control" value="{{ old('nom', $fournisseur->nom ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Contact</label>
    <input type="text" name="contact" class="form-control" value="{{ old('contact', $fournisseur->contact ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Téléphone</label>
    <input type="text" name="telephone" class="form-control" value="{{ old('telephone', $fournisseur->telephone ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $fournisseur->email ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Adresse</label>
    <input type="text" name="adresse" class="form-control" value="{{ old('adresse', $fournisseur->adresse ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Spécialité</label>
    <input type="text" name="specialite" class="form-control" value="{{ old('specialite', $fournisseur->specialite ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Statut</label>
    <select name="statut" class="form-control" required>
        <option value="Actif" @selected(old('statut', $fournisseur->statut ?? '') === 'Actif')>Actif</option>
        <option value="Inactif" @selected(old('statut', $fournisseur->statut ?? '') === 'Inactif')>Inactif</option>
    </select>
</div>
<button class="btn btn-success"><i class="fas fa-save"></i> Enregistrer</button>
<a href="{{ route('fournisseurs.index') }}" class="btn btn-secondary">Retour</a>
