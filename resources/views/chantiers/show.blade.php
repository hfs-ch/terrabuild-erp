@extends('layouts.master')

@section('title', 'Détails du chantier')

@section('content')

<div class="row">

    <div class="col-md-8">

        <div class="card card-primary card-outline">

            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-building"></i>
                    Informations du chantier
                </h3>
            </div>

            <div class="card-body">

                <table class="table table-striped">

                    <tr>
                        <th width="220">Référence</th>
                        <td>{{ $chantier->reference }}</td>
                    </tr>

                    <tr>
                        <th>Nom</th>
                        <td>{{ $chantier->nom }}</td>
                    </tr>

                    <tr>
                        <th>Projet</th>
                        <td>{{ $chantier->projet->nom ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Adresse</th>
                        <td>{{ $chantier->adresse }}</td>
                    </tr>

                    <tr>
                        <th>Date début</th>
                        <td>{{ $chantier->date_debut }}</td>
                    </tr>

                    <tr>
                        <th>Date fin</th>
                        <td>{{ $chantier->date_fin }}</td>
                    </tr>

                    <tr>
                        <th>Budget</th>
                        <td>{{ number_format($chantier->budget,2,',',' ') }} MAD</td>
                    </tr>

                    <tr>
                        <th>Statut</th>
                        <td>
                            @if($chantier->statut=='En cours')
                                <span class="badge badge-warning">{{ $chantier->statut }}</span>
                            @elseif($chantier->statut=='Terminé')
                                <span class="badge badge-success">{{ $chantier->statut }}</span>
                            @else
                                <span class="badge badge-secondary">{{ $chantier->statut }}</span>
                            @endif
                        </td>
                    </tr>

                </table>

            </div>

            <div class="card-footer">

                <a href="{{ route('chantiers.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour
                </a>

                <a href="{{ route('chantiers.edit',$chantier) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Modifier
                </a>

            </div>

        </div>

    </div>

</div>

@endsection