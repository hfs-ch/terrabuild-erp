@extends('layouts.master')
@section('title', 'Détail paiement')

@section('content')
<div class="card">
    <div class="card-header bg-info text-white">
        <h3 class="card-title"><i class="fas fa-info-circle"></i> Détail du paiement</h3>
    </div>
    <div class="card-body">
        <p><strong>Facture :</strong> {{ $paiement->facture->id ?? '-' }}</p>
        <p><strong>Montant :</strong> {{ number_format($paiement->montant, 2, ',', ' ') }}</p>
        <p><strong>Date :</strong> {{ $paiement->date_paiement?->format('d/m/Y') }}</p>
        <p><strong>Moyen :</strong> {{ $paiement->moyen_paiement ?? '-' }}</p>
        <p><strong>Référence :</strong> {{ $paiement->reference ?? '-' }}</p>
        <a href="{{ route('paiements.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Retour</a>
    </div>
</div>
@endsection
