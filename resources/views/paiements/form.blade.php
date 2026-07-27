<div class="mb-3">
    <label class="form-label">Client</label>
    <select name="client_id" class="form-control" required>
        <option value="">Sélectionner un client</option>
        @foreach($clients as $client)
            <option value="{{ $client->id }}" @selected(old('client_id', $paiement->client_id ?? '') == $client->id)>{{ $client->nom }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Facture</label>
    <select name="facture_id" class="form-control" required>
        <option value="">Sélectionner une facture</option>
        @foreach($factures as $facture)
            <option value="{{ $facture->id }}" @selected(old('facture_id', $paiement->facture_id ?? '') == $facture->id)>Facture #{{ $facture->reference ?? $facture->id }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Montant</label>
    <input type="number" step="0.01" name="montant" class="form-control" value="{{ old('montant', $paiement->montant ?? 0) }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Date du paiement</label>
    <input type="date" name="date_paiement" class="form-control" value="{{ old('date_paiement', optional($paiement->date_paiement)->format('Y-m-d') ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Mode de paiement</label>
    <select name="mode" class="form-control" required>
        <option value="">Sélectionner un mode</option>
        @foreach(['Espèces', 'Chèque', 'Virement', 'Carte'] as $mode)
            <option value="{{ $mode }}" @selected(old('mode', $paiement->mode ?? '') === $mode)>{{ $mode }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Statut</label>
    <select name="statut" class="form-control" required>
        @foreach(['Reçu', 'En attente', 'Annulé'] as $statut)
            <option value="{{ $statut }}" @selected(old('statut', $paiement->statut ?? '') === $statut)>{{ $statut }}</option>
        @endforeach
    </select>
</div>
<button class="btn btn-success"><i class="fas fa-save"></i> Enregistrer</button>
<a href="{{ route('paiements.index') }}" class="btn btn-secondary">Retour</a>
