<nav class="navbar navbar-expand-lg bg-white shadow-sm px-4 py-3">

    <div class="container-fluid">

        <!-- Menu mobile -->
        <button class="btn btn-light d-lg-none me-3" id="menu-toggle">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Recherche -->
        <form class="d-flex flex-grow-1 me-4">

            <div class="input-group">

                <span class="input-group-text bg-white border-end-0">
                    <i class="fas fa-search text-secondary"></i>
                </span>

                <input
                    type="text"
                    class="form-control border-start-0"
                    placeholder="Rechercher..."
                >

            </div>

        </form>

        <!-- Partie droite -->

        <ul class="navbar-nav align-items-center ms-auto">

            <!-- Date -->

            <li class="nav-item me-3">

                <span class="text-secondary">

                    <i class="far fa-calendar-alt"></i>

                    {{ now()->format('d/m/Y') }}

                </span>

            </li>

            <!-- Notifications -->

            <li class="nav-item dropdown me-3">

                <a class="nav-link position-relative"
                   href="#"
                   data-bs-toggle="dropdown">

                    <i class="fas fa-bell fa-lg"></i>

                    <span
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                        3

                    </span>

                </a>

                <ul class="dropdown-menu dropdown-menu-end shadow">

                    <li class="dropdown-header">

                        Notifications

                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            Nouveau chantier créé
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            Facture payée
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            Nouveau client
                        </a>
                    </li>

                </ul>

            </li>

            <!-- Dark Mode -->

            <li class="nav-item me-3">

                <button
                    class="btn btn-light"
                    id="theme-toggle">

                    <i class="fas fa-moon"></i>

                </button>

            </li>

            <!-- Utilisateur -->

            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle d-flex align-items-center"
                   href="#"
                   data-bs-toggle="dropdown">

                    <img
                        src="{{ asset('images/avatar.png') }}"
                        width="40"
                        height="40"
                        class="rounded-circle me-2"
                    >

                    <div>

                        <strong>

                            {{ Auth::user()->name }}

                        </strong>

                        <br>

                        <small class="text-muted">

                            Administrateur

                        </small>

                    </div>

                </a>

                <ul class="dropdown-menu dropdown-menu-end shadow">

                    <li>

                        <a
                            class="dropdown-item"
                            href="#">

                            <i class="fas fa-user me-2"></i>

                            Mon Profil

                        </a>

                    </li>

                    <li>

                        <a
                            class="dropdown-item"
                            href="#">

                            <i class="fas fa-cog me-2"></i>

                            Paramètres

                        </a>

                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>

                        <form
                            method="POST"
                            action="{{ route('logout') }}">

                            @csrf

                            <button
                                type="submit"
                                class="dropdown-item text-danger">

                                <i class="fas fa-sign-out-alt me-2"></i>

                                Déconnexion

                            </button>

                        </form>

                    </li>

                </ul>

            </li>

        </ul>

    </div>

</nav>