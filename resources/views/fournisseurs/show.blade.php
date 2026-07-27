@extends('layouts.master')
@section('title', 'Détail fournisseur')

@section('content')
<div class="card">
    <div class="card-header bg-info text-white">
        <h3 class="card-title"><i class="fas fa-info-circle"></i> Détail du fournisseur</h3>
    </div>
    <div class="card-body">
        <p><strong>Nom :</strong> {{ $fournisseur->nom }}</p>
        <p><strong>Contact :</strong> {{ $fournisseur->contact ?? '-' }}</p>
        <p><strong>Téléphone :</strong> {{ $fournisseur->telephone ?? '-' }}</p>
        <p><strong>Email :</strong> {{ $fournisseur->email ?? '-' }}</p>
        <p><strong>Adresse :</strong> {{ $fournisseur->adresse ?? '-' }}</p>
        <p><strong>Spécialité :</strong> {{ $fournisseur->specialite ?? '-' }}</p>
        <p><strong>Statut :</strong> <span class="badge {{ $fournisseur->statut === 'Actif' ? 'bg-success' : 'bg-secondary' }}">{{ $fournisseur->statut }}</span></p>
        <a href="{{ route('fournisseurs.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Retour</a>
    </div>
</div>
@endsection
