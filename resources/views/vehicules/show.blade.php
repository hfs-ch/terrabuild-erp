@extends('layouts.master')
@section('title', 'Détail véhicule')

@section('content')
<div class="card">
    <div class="card-header bg-info text-white">
        <h3 class="card-title"><i class="fas fa-info-circle"></i> Détail du véhicule</h3>
    </div>
    <div class="card-body">
        <p><strong>Immatriculation :</strong> {{ $vehicule->immatriculation }}</p>
        <p><strong>Marque :</strong> {{ $vehicule->marque }}</p>
        <p><strong>Modèle :</strong> {{ $vehicule->modele ?? '-' }}</p>
        <p><strong>Type :</strong> {{ $vehicule->type }}</p>
        <p><strong>Chauffeur :</strong> {{ $vehicule->chauffeur ?? '-' }}</p>
        <p><strong>Statut :</strong> <span class="badge {{ $vehicule->statut === 'Disponible' ? 'bg-success' : 'bg-warning' }}">{{ $vehicule->statut }}</span></p>
        <p><strong>Chantier :</strong> {{ $vehicule->chantier->nom ?? '-' }}</p>
        <a href="{{ route('vehicules.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Retour</a>
    </div>
</div>
@endsection
