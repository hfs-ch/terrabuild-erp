@extends('layouts.master')
@section('title','Détails du mouvement')

@section('content')

<div class="card">

    <div class="card-header bg-info text-white">

        <h3 class="card-title">

            Mouvement de stock

        </h3>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>

                <th>Matériel</th>

                <td>{{ $stock->materiel->nom }}</td>

            </tr>

            <tr>

                <th>Type</th>

                <td>{{ $stock->type }}</td>

            </tr>

            <tr>

                <th>Quantité</th>

                <td>{{ $stock->quantite }}</td>

            </tr>

            <tr>

                <th>Date</th>

                <td>{{ $stock->date_mouvement }}</td>

            </tr>

            <tr>

                <th>Référence</th>

                <td>{{ $stock->reference }}</td>

            </tr>

            <tr>

                <th>Observation</th>

                <td>{{ $stock->observation }}</td>

            </tr>

        </table>

        <a
            href="{{ route('stocks.index') }}"
            class="btn btn-secondary">

            Retour

        </a>

        <a
            href="{{ route('stocks.edit',$stock) }}"
            class="btn btn-warning">

            Modifier

        </a>

    </div>

</div>

@endsection