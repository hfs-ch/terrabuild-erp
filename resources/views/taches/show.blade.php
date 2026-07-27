@extends('layouts.master')
@section('title', 'Détail tâche')

@section('content')
<div class="card">
    <div class="card-header bg-info text-white">
        <h3 class="card-title"><i class="fas fa-info-circle"></i> Détail de la tâche</h3>
    </div>
    <div class="card-body">
        <p><strong>Titre :</strong> {{ $tache->titre }}</p>
        <p><strong>Chantier :</strong> {{ $tache->chantier->nom ?? '-' }}</p>
        <p><strong>Employé :</strong> {{ $tache->employe->nom ?? '-' }}</p>
        <p><strong>Date début :</strong> {{ $tache->date_debut?->format('d/m/Y') }}</p>
        <p><strong>Date fin :</strong> {{ $tache->date_fin?->format('d/m/Y') ?? '-' }}</p>
        <p><strong>Statut :</strong> <span class="badge bg-info">{{ $tache->statut }}</span></p>
        <p><strong>Priorité :</strong> <span class="badge bg-secondary">{{ $tache->priorite }}</span></p>
        <p><strong>Description :</strong> {{ $tache->description ?? '-' }}</p>
        <a href="{{ route('taches.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Retour</a>
    </div>
</div>
@endsection
