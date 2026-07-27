@extends('layouts.master')
@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">
            Détails de l'employé
        </div>

        <div class="card-body">

            <h4>{{ $employe->nom }} {{ $employe->prenom }}</h4>

            <hr>

            <p><strong>Matricule :</strong> {{ $employe->matricule }}</p>
            <p><strong>Poste :</strong> {{ $employe->poste }}</p>
            <p><strong>Email :</strong> {{ $employe->email }}</p>
            <p><strong>Téléphone :</strong> {{ $employe->telephone }}</p>
            <p><strong>Salaire :</strong> {{ $employe->salaire }} MAD</p>

            <a href="{{ route('employes.index') }}" class="btn btn-primary">
                Retour
            </a>

        </div>

    </div>

</div>

@endsection