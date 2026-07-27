@extends('layouts.master')
@section('title','Détails Matériel')

@section('content')

<div class="card">

    <div class="card-header bg-info text-white">

        <h3 class="card-title">

            {{ $materiel->nom }}

        </h3>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>

                <th>Nom</th>

                <td>{{ $materiel->nom }}</td>

            </tr>

            <tr>

                <th>Catégorie</th>

                <td>{{ $materiel->categorie }}</td>

            </tr>

            <tr>

                <th>Marque</th>

                <td>{{ $materiel->marque }}</td>

            </tr>

            <tr>

                <th>Quantité</th>

                <td>{{ $materiel->quantite }}</td>

            </tr>

            <tr>

                <th>État</th>

                <td>{{ $materiel->etat }}</td>

            </tr>

            <tr>

                <th>Chantier</th>

                <td>{{ $materiel->chantier->nom ?? '-' }}</td>

            </tr>

            <tr>

                <th>Description</th>

                <td>{{ $materiel->description }}</td>

            </tr>

        </table>

        <a href="{{ route('materiels.index') }}"
           class="btn btn-secondary">

            Retour

        </a>

        <a href="{{ route('materiels.edit',$materiel) }}"
           class="btn btn-warning">

            Modifier

        </a>

    </div>

</div>

@endsection