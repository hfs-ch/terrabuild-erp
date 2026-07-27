
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title','TerraBuild ERP')</title>

    <link rel="icon" href="{{ asset('images/logo.png') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css'])
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>
        <li class="nav-item">
    <a class="nav-link" href="#" id="theme-toggle">
        <i class="fas fa-moon"></i>
    </a>
</li>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <span class="nav-link">
                    <i class="fas fa-user-circle"></i>
                    {{ auth()->user()->name }}
                </span>
            </li>
        </ul>

    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <a href="{{ route('dashboard') }}" class="brand-link">

            <img
                src="{{ asset('images/logo.png') }}"
                class="brand-image img-circle elevation-3"
                style="opacity:.95;max-height:60px;"
            >

            <span class="brand-text font-weight-bold">
                TerraBuild ERP
            </span>

        </a>

        <div class="sidebar">

            <nav>

                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('clients.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Clients</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('employes.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>Employés</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('projets.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-diagram-project"></i>
                            <p>Projets</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('chantiers.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-building"></i>
                            <p>Chantiers</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('equipes.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-users-gear"></i>
                            <p>Équipes</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('materiels.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-screwdriver-wrench"></i>
                            <p>Matériels</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('stocks.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-boxes-stacked"></i>
                            <p>Stocks</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('vehicules.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-truck"></i>
                            <p>Véhicules</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('taches.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-list-check"></i>
                            <p>Tâches</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('presences.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-calendar-check"></i>
                            <p>Présences</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('salaires.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-money-bill-wave"></i>
                            <p>Salaires</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('devis.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-file-signature"></i>
                            <p>Devis</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('factures.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-file-invoice-dollar"></i>
                            <p>Factures</p>
                        </a>
                    </li>

                    @if(Route::has('documents.index'))
                    <li class="nav-item">
                        <a href="{{ route('documents.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-folder-open"></i>
                            <p>Documents</p>
                        </a>
                    </li>
                    @endif

                    @if(Route::has('paiements.index'))
                    <li class="nav-item">
                        <a href="{{ route('paiements.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-money-check-dollar"></i>
                            <p>Paiements</p>
                        </a>
                    </li>
                    @endif

                    <li class="nav-item">

                        <form action="{{ route('logout') }}" method="POST">

                            @csrf

                            <button class="nav-link border-0 bg-transparent text-white w-100 text-left">

                                <i class="nav-icon fas fa-right-from-bracket"></i>

                                <p>Déconnexion</p>

                            </button>

                        </form>

                    </li>

                </ul>

            </nav>

        </div>

    </aside>

    <div class="content-wrapper">

        <section class="content-header">

            <div class="container-fluid">

                <h1>@yield('title')</h1>

            </div>

        </section>

        <section class="content">

            <div class="container-fluid">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')

            </div>

        </section>

    </div>

    <footer class="main-footer">

        <strong>TerraBuild ERP © {{ date('Y') }}</strong>

        <div class="float-right">

            Version 1.0

        </div>

    </footer>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

@vite(['resources/js/app.js'])

</body>
</html>