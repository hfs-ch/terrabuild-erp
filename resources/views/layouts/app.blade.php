<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Gestion BTP</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container-fluid">

<div class="row">

<div class="col-2 bg-dark text-white vh-100">

<h3 class="mt-3">🏗 Gestion BTP</h3>

<hr>

<ul class="nav flex-column">

<li class="nav-item">
<a class="nav-link text-white" href="/dashboard">Dashboard</a>
</li>

<li class="nav-item">
<a class="nav-link text-white" href="/employes">Employés</a>
</li>

<li class="nav-item">
<a class="nav-link text-white" href="/clients">Clients</a>
</li>

<li class="nav-item">
<a class="nav-link text-white" href="/projets">Projets</a>
</li>
<a class="nav-link text-white" href="/chantiers">Chantiers</a>

<a class="nav-link text-white" href="/equipes">Équipes</a>

<a class="nav-link text-white" href="/materiels"> Matériels</a>

<li class="nav-item">
<a class="nav-link text-white" href="/stocks">Stocks</a>
</li>

<li class="nav-item">
<a class="nav-link text-white" href="/factures">Factures</a>
</li>

</ul>

</div>

<div class="col-10">

<nav class="navbar bg-light">

<div class="container-fluid">

<span class="navbar-brand mb-0 h1">
ERP Gestion BTP
</span>

</div>

</nav>

<div class="container mt-4">

@yield('content')

</div>

</div>

</div>

</div>

</body>
</html>