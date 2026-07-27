@extends('layouts.master')
@section('title', 'Détail document')

@section('content')
<div class="card">
    <div class="card-header bg-info text-white">
        <h3 class="card-title"><i class="fas fa-info-circle"></i> Détail du document</h3>
    </div>
    <div class="card-body">
        <p><strong>Nom :</strong> {{ $document->nom }}</p>
        <p><strong>Type :</strong> {{ $document->type }}</p>
        <p><strong>Projet :</strong> {{ $document->projet->nom ?? '-' }}</p>
        <p><strong>Chemin stockage :</strong> {{ $document->chemin ?? '-' }}</p>
        <p><strong>Description :</strong> {{ $document->description ?? '-' }}</p>
        <a href="{{ route('documents.download', $document) }}" class="btn btn-success">Télécharger</a>
        <a href="{{ route('documents.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Retour</a>
    </div>
</div>
@endsection
