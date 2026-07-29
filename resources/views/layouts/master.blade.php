<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>TerraBuild ERP</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

<div class="d-flex">

    <!-- Sidebar -->
    <aside class="sidebar p-3" style="width:260px;">

        <h3 class="text-white mb-4">
            <i class="bi bi-building"></i>
            TerraBuild
        </h3>

        <ul class="nav flex-column">

            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="bi bi-speedometer2"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('clients.index') }}" class="nav-link">
                    <i class="bi bi-people"></i>
                    Clients
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('projets.index') }}" class="nav-link">
                    <i class="bi bi-folder2-open"></i>
                    Projets
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('chantiers.index') }}" class="nav-link">
                    <i class="bi bi-cone-striped"></i>
                    Chantiers
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('equipes.index') }}" class="nav-link">
                    <i class="bi bi-diagram-3"></i>
                    Équipes
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('employes.index') }}" class="nav-link">
                    <i class="bi bi-person-badge"></i>
                    Employés
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('materiels.index') }}" class="nav-link">
                    <i class="bi bi-tools"></i>
                    Matériels
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('stocks.index') }}" class="nav-link">
                    <i class="bi bi-box-seam"></i>
                    Stock
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('vehicules.index') }}" class="nav-link">
                    <i class="bi bi-truck"></i>
                    Véhicules
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('fournisseurs.index') }}" class="nav-link">
                    <i class="bi bi-shop"></i>
                    Fournisseurs
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('devis.index') }}" class="nav-link">
                    <i class="bi bi-file-earmark-text"></i>
                    Devis
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('factures.index') }}" class="nav-link">
                    <i class="bi bi-receipt"></i>
                    Factures
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('paiements.index') }}" class="nav-link">
                    <i class="bi bi-credit-card"></i>
                    Paiements
                </a>
            </li>

            

        </ul>

    </aside>

    <!-- Content -->
    <div class="flex-grow-1">

        <!-- Navbar -->
        <nav class="navbar px-4">

            <div class="container-fluid">

                <span class="fw-bold">
                    ERP Gestion BTP
                </span>

                <div>

                    <span class="me-3">
                        Bonjour,
                        {{ Auth::user()->name }}
                    </span>

                    <form action="{{ route('logout') }}" method="POST" class="d-inline">

                        @csrf

                        <button class="btn btn-outline-danger btn-sm">

                            <i class="bi bi-box-arrow-right"></i>

                            Déconnexion

                        </button>

                    </form>

                </div>

            </div>

        </nav>

        <!-- Page -->
        <main class="content-wrapper">

            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif

            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            @yield('content')

        </main>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>