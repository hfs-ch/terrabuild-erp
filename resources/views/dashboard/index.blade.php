@extends('layouts.master')

@section('content')

<div class="container-fluid">

    <div class="row mb-4">

        <div class="col">

            <h2 class="fw-bold">
                Dashboard
            </h2>

            <p class="text-muted">
                Bienvenue dans TerraBuild ERP
            </p>

        </div>

    </div>

    <div class="row g-4">

        <div class="col-lg-3">

            <div class="dashboard-card bg-blue">

                <h6>Clients</h6>

                <h2>{{ $clients }}</h2>

                <i class="bi bi-people-fill"></i>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="dashboard-card bg-green">

                <h6>Projets</h6>

                <h2>{{ $projets }}</h2>

                <i class="bi bi-folder-fill"></i>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="dashboard-card bg-orange">

                <h6>Chantiers</h6>

                <h2>{{ $chantiers }}</h2>

                <i class="bi bi-cone-striped"></i>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="dashboard-card bg-red">

                <h6>Employés</h6>

                <h2>{{ $employes }}</h2>

                <i class="bi bi-person-badge-fill"></i>

            </div>

        </div>

    </div>

    <div class="row mt-5">

        <div class="col-lg-8">

            <div class="card">

                <div class="card-header">

                    Activité récente

                </div>

                <div class="card-body">

                    <table class="table">

                        <thead>

                        <tr>

                            <th>Module</th>

                            <th>Nom</th>

                            <th>Date</th>

                        </tr>

                        </thead>

                        <tbody>

                        @foreach($recentProjects as $projet)

                            <tr>

                                <td>Projet</td>

                                <td>{{ $projet->nom }}</td>

                                <td>{{ $projet->created_at->format('d/m/Y') }}</td>

                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="card">

                <div class="card-header">

                    Raccourcis

                </div>

                <div class="card-body d-grid gap-2">

                    <a href="{{ route('clients.create') }}" class="btn btn-primary">
                        Nouveau Client
                    </a>

                    <a href="{{ route('projets.create') }}" class="btn btn-success">
                        Nouveau Projet
                    </a>

                    <a href="{{ route('chantiers.create') }}" class="btn btn-warning text-white">
                        Nouveau Chantier
                    </a>

                    <a href="{{ route('factures.create') }}" class="btn btn-danger">
                        Nouvelle Facture
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
