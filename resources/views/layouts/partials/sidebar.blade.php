<aside class="sidebar">

    <div class="logo">

        <img src="{{ asset('images/logo.png') }}" alt="Logo">

        <div>
            <h4>TerraBuild</h4>
            <small>ERP Construction</small>
        </div>

    </div>

    <ul class="menu">

        <li>
            <a href="{{ route('dashboard') }}">
                <i class="fas fa-chart-line"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="menu-title">
            Gestion Commerciale
        </li>

        <li>
            <a href="{{ route('clients.index') }}">
                <i class="fas fa-users"></i>
                <span>Clients</span>
            </a>
        </li>

        <li>
            <a href="{{ route('devis.index') }}">
                <i class="fas fa-file-signature"></i>
                <span>Devis</span>
            </a>
        </li>

        <li>
            <a href="{{ route('factures.index') }}">
                <i class="fas fa-file-invoice-dollar"></i>
                <span>Factures</span>
            </a>
        </li>

        <li>
            <a href="{{ route('paiements.index') }}">
                <i class="fas fa-credit-card"></i>
                <span>Paiements</span>
            </a>
        </li>

        <li class="menu-title">
            Gestion BTP
        </li>

        <li>
            <a href="{{ route('projets.index') }}">
                <i class="fas fa-folder"></i>
                <span>Projets</span>
            </a>
        </li>

        <li>
            <a href="{{ route('chantiers.index') }}">
                <i class="fas fa-hard-hat"></i>
                <span>Chantiers</span>
            </a>
        </li>

        <li>
            <a href="{{ route('equipes.index') }}">
                <i class="fas fa-people-group"></i>
                <span>Equipes</span>
            </a>
        </li>

        <li>
            <a href="{{ route('employes.index') }}">
                <i class="fas fa-user-tie"></i>
                <span>Employés</span>
            </a>
        </li>

        <li>
            <a href="{{ route('presences.index') }}">
                <i class="fas fa-calendar-check"></i>
                <span>Présences</span>
            </a>
        </li>

        <li>
            <a href="{{ route('salaires.index') }}">
                <i class="fas fa-money-bill-wave"></i>
                <span>Salaires</span>
            </a>
        </li>

        <li class="menu-title">
            Ressources
        </li>

        <li>
            <a href="{{ route('materiels.index') }}">
                <i class="fas fa-toolbox"></i>
                <span>Matériels</span>
            </a>
        </li>

        <li>
            <a href="{{ route('stocks.index') }}">
                <i class="fas fa-boxes-stacked"></i>
                <span>Stocks</span>
            </a>
        </li>

        <li>
            <a href="{{ route('vehicules.index') }}">
                <i class="fas fa-truck"></i>
                <span>Véhicules</span>
            </a>
        </li>

        <li>
            <a href="{{ route('fournisseurs.index') }}">
                <i class="fas fa-building"></i>
                <span>Fournisseurs</span>
            </a>
        </li>

        

        <li class="menu-title">
            Compte
        </li>

        <li>

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button type="submit" class="logout-btn">

                    <i class="fas fa-right-from-bracket"></i>

                    Déconnexion

                </button>

            </form>

        </li>

    </ul>

</aside>