@extends('layouts.master')
@section('title', 'Dashboard ERP BTP')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0"><i class="fas fa-tachometer-alt"></i> Dashboard ERP BTP</h1>
        <span class="badge badge-info px-3 py-2">Vue d'ensemble</span>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $employes }}</h3>
                    <p>Employés</p>
                </div>
                <div class="icon"><i class="fas fa-users"></i></div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $clients }}</h3>
                    <p>Clients</p>
                </div>
                <div class="icon"><i class="fas fa-user-tie"></i></div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $projets }}</h3>
                    <p>Projets</p>
                </div>
                <div class="icon"><i class="fas fa-building"></i></div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $chantiers }}</h3>
                    <p>Chantiers</p>
                </div>
                <div class="icon"><i class="fas fa-hard-hat"></i></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $equipes }}</h3>
                    <p>Équipes</p>
                </div>
                <div class="icon"><i class="fas fa-users-cog"></i></div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $materiels }}</h3>
                    <p>Matériels</p>
                </div>
                <div class="icon"><i class="fas fa-cogs"></i></div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-indigo">
                <div class="inner">
                    <h3>{{ $fournisseurs }}</h3>
                    <p>Fournisseurs</p>
                </div>
                <div class="icon"><i class="fas fa-truck"></i></div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-maroon">
                <div class="inner">
                    <h3>{{ number_format($stock_value, 0, ',', ' ') }} €</h3>
                    <p>Valeur du stock</p>
                </div>
                <div class="icon"><i class="fas fa-boxes"></i></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-dark">
                <div class="inner">
                    <h3>{{ $factures_impayees }}</h3>
                    <p>Factures impayées</p>
                </div>
                <div class="icon"><i class="fas fa-file-invoice-dollar"></i></div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ number_format($paiements_recus, 0, ',', ' ') }} €</h3>
                    <p>Paiements reçus</p>
                </div>
                <div class="icon"><i class="fas fa-wallet"></i></div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>{{ $vehicules }}</h3>
                    <p>Véhicules</p>
                </div>
                <div class="icon"><i class="fas fa-truck-moving"></i></div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-orange">
                <div class="inner">
                    <h3>{{ $documents }}</h3>
                    <p>Documents</p>
                </div>
                <div class="icon"><i class="fas fa-folder-open"></i></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-chart-pie"></i> Répartition des projets</h3>
                </div>
                <div class="card-body">
                    <canvas id="projectChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-chart-bar"></i> Répartition des factures</h3>
                </div>
                <div class="card-body">
                    <canvas id="invoiceChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-wallet"></i> Paiements reçus par mois</h3>
                </div>
                <div class="card-body">
                    <canvas id="paymentChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-bell"></i> Alertes et notifications</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Stock à surveiller</span>
                            <span class="badge badge-warning">{{ $stock_total }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Factures impayées</span>
                            <span class="badge badge-danger">{{ $factures_impayees }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Paiements reçus</span>
                            <span class="badge badge-success">{{ number_format($paiements_recus, 0, ',', ' ') }} €</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Documents enregistrés</span>
                            <span class="badge badge-info">{{ $documents }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const projectLabels = @json(array_keys($projetStats));
        const projectData = @json(array_values($projetStats));
        const invoiceLabels = @json(array_keys($factureStats));
        const invoiceData = @json(array_values($factureStats));
        const paymentLabels = @json(array_keys($paiementStats));
        const paymentData = @json(array_values($paiementStats));

        new Chart(document.getElementById('projectChart'), {
            type: 'pie',
            data: {
                labels: projectLabels,
                datasets: [{
                    data: projectData,
                    backgroundColor: ['#17a2b8', '#28a745', '#ffc107', '#dc3545', '#6f42c1']
                }]
            },
            options: { responsive: true }
        });

        new Chart(document.getElementById('invoiceChart'), {
            type: 'doughnut',
            data: {
                labels: invoiceLabels,
                datasets: [{
                    data: invoiceData,
                    backgroundColor: ['#28a745', '#ffc107', '#dc3545', '#6c757d']
                }]
            },
            options: { responsive: true }
        });

        new Chart(document.getElementById('paymentChart'), {
            type: 'bar',
            data: {
                labels: paymentLabels,
                datasets: [{
                    label: 'Montant reçu (€)',
                    data: paymentData,
                    backgroundColor: '#17a2b8'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@stop