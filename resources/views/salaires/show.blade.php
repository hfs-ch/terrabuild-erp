@extends('layouts.master')
@section('title', 'Détail salaire')

@section('content')
<div class="card">
    <div class="card-header bg-info text-white">
        <h3 class="card-title"><i class="fas fa-info-circle"></i> Détail du salaire</h3>
    </div>
    <div class="card-body">
        <p><strong>Employé :</strong> {{ $salaire->employe->nom ?? '-' }}</p>
        <p><strong>Période :</strong> {{ $salaire->periode }}</p>
        <p><strong>Salaire de base :</strong> {{ number_format($salaire->salaire_base, 2, ',', ' ') }}</p>
        <p><strong>Avance :</strong> {{ number_format($salaire->avance, 2, ',', ' ') }}</p>
        <p><strong>Net à payer :</strong> {{ number_format($salaire->net_a_payer, 2, ',', ' ') }}</p>
        <p><strong>Commentaire :</strong> {{ $salaire->commentaire ?? '-' }}</p>
        <a href="{{ route('salaires.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Retour</a>
    </div>
</div>
@endsection
