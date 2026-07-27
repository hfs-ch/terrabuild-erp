@extends('layouts.print')
@section('title','Détail facture')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between">

        <h3 class="card-title">Facture {{ $facture->reference }}</h3>

        <a href="{{ route('factures.print',$facture) }}"
           class="btn btn-danger"
           target="_blank">

            <i class="fas fa-print"></i> Imprimer

        </a>

    </div>

    <div class="card-body">

        <p><strong>Client :</strong> {{ $facture->client->nom }}</p>

        <p><strong>Date :</strong> {{ $facture->date_emission->format('d/m/Y') }}</p>

        <p><strong>Échéance :</strong> {{ $facture->date_echeance->format('d/m/Y') }}</p>

        <table class="table table-bordered mt-3">

            <thead>

            <tr>

                <th>Désignation</th>

                <th>Qté</th>

                <th>PU HT</th>

                <th>TVA</th>

                <th>Total TTC</th>

            </tr>

            </thead>

            <tbody>

            @foreach($facture->lignes as $ligne)

                <tr>

                    <td>{{ $ligne->designation }}</td>

                    <td>{{ $ligne->quantite }}</td>

                    <td>{{ number_format($ligne->prix_unitaire,2,',',' ') }} MAD</td>

                    <td>{{ $ligne->tva }} %</td>

                    <td>{{ number_format($ligne->total_ttc,2,',',' ') }} MAD</td>

                </tr>

            @endforeach

            </tbody>

        </table>

        <div class="row justify-content-end">

            <div class="col-md-4">

                <table class="table">

                    <tr>

                        <th>Sous-total</th>

                        <td>{{ number_format($facture->sous_total,2,',',' ') }} MAD</td>

                    </tr>

                    <tr>

                        <th>TVA</th>

                        <td>{{ number_format($facture->montant_tva,2,',',' ') }} MAD</td>

                    </tr>

                    <tr>

                        <th>Remise</th>

                        <td>{{ number_format($facture->remise,2,',',' ') }} MAD</td>

                    </tr>

                    <tr class="table-success">

                        <th>TOTAL TTC</th>

                        <td><strong>{{ number_format($facture->montant_ttc,2,',',' ') }} MAD</strong></td>

                    </tr>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection