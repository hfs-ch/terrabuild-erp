@extends('layouts.master')
@section('title', 'Détail présence')

@section('content')
<div class="card">
    <div class="card-header bg-info text-white">
        <h3 class="card-title"><i class="fas fa-info-circle"></i> Détail de la présence</h3>
    </div>
    <div class="card-body">
        <p><strong>Employé :</strong> {{ $presence->employe->nom ?? '-' }}</p>
        <p><strong>Date :</strong> {{ $presence->date?->format('d/m/Y') }}</p>
        <p><strong>Heure entrée :</strong> {{ $presence->heure_entree ?? '-' }}</p>
        <p><strong>Heure sortie :</strong> {{ $presence->heure_sortie ?? '-' }}</p>
        <p><strong>Statut :</strong> <span class="badge bg-success">{{ $presence->statut }}</span></p>
        <a href="{{ route('presences.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Retour</a>
    </div>
</div>
@endsection
