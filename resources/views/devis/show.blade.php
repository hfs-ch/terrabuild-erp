@extends('layouts.print')
@section('title', 'Détail devis')

@section('content')
<div class="card">
    <div class="card-header bg-info text-white">
        <h3 class="card-title"><i class="fas fa-info-circle"></i> Détail du devis</h3>
    </div>
    <div class="card-body">
        <p><strong>Client :</strong> {{ $devis->client->nom ?? '-' }}</p>
        <p><strong>Projet :</strong> {{ $devis->projet->nom ?? '-' }}</p>
        <p><strong>Montant :</strong> {{ number_format($devis->montant, 2, ',', ' ') }}</p>
        <p><strong>Statut :</strong> <span class="badge bg-info">{{ $devis->statut }}</span></p>
        <p><strong>Date :</strong> {{ $devis->date?->format('d/m/Y') }}</p>
        <p><strong>Description :</strong> {{ $devis->description ?? '-' }}</p>
        <a href="{{ route('devis.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Retour</a>
    </div>
</div>
@endsection
