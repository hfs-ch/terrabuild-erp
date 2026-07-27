@extends('layouts.master')
@section('title', 'Détails du Projet')

@section('content')

<div class="card">

    <div class="card-header bg-info text-white">

        <h3 class="card-title">

            {{ $projet->nom }}

        </h3>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>

                <th>Référence</th>

                <td>{{ $projet->reference }}</td>

            </tr>

            <tr>

                <th>Nom</th>

                <td>{{ $projet->nom }}</td>

            </tr>

            <tr>

                <th>Description</th>

                <td>{{ $projet->description }}</td>

            </tr>

            <tr>

                <th>Client</th>

                <td>{{ $projet->client->nom }}</td>

            </tr>

            <tr>

                <th>Date début</th>

                <td>{{ $projet->date_debut }}</td>

            </tr>

            <tr>

                <th>Date fin</th>

                <td>{{ $projet->date_fin }}</td>

            </tr>

            <tr>

                <th>Budget</th>

                <td>{{ number_format($projet->budget,2) }} MAD</td>

            </tr>

            <tr>

                <th>Statut</th>

                <td>{{ $projet->statut }}</td>

            </tr>

        </table>

        <a href="{{ route('projets.index') }}"
           class="btn btn-secondary">

            Retour

        </a>

        <a href="{{ route('projets.edit',$projet) }}"
           class="btn btn-warning">

            Modifier

        </a>

    </div>

</div>

@endsection