<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TerraBuild ERP</title>

    <link rel="icon" href="{{ asset('images/logo.png') }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <style>

        *{
            font-family:Poppins,sans-serif;
        }

        body{
            background:#f4f6f9;
        }

        /* HERO */

        .hero{

            min-height:100vh;

            background:linear-gradient(rgba(20,35,55,.75),rgba(20,35,55,.75)),
            url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1600&q=80');

            background-size:cover;
            background-position:center;

            color:white;

            display:flex;
            align-items:center;

        }

        .hero h1{

            font-size:60px;
            font-weight:800;

        }

        .hero p{

            font-size:22px;
            opacity:.95;

        }

        .btn-gold{

            background:#C9962E;
            color:white;
            border:none;
            padding:14px 35px;
            border-radius:10px;
            font-weight:600;

        }

        .btn-gold:hover{

            background:#b98923;
            color:white;

        }

        .btn-outline-light{

            padding:14px 35px;

        }

        section{

            padding:90px 0;

        }

        .title{

            font-weight:700;
            margin-bottom:50px;

        }

        .feature{

            background:white;

            border-radius:18px;

            padding:35px;

            text-align:center;

            transition:.3s;

            box-shadow:0 10px 30px rgba(0,0,0,.08);

        }

        .feature:hover{

            transform:translateY(-8px);

        }

        .feature i{

            font-size:45px;

            color:#C9962E;

            margin-bottom:20px;

        }

        .stat{

            text-align:center;

            color:white;

        }

        .stat h2{

            font-size:45px;

            font-weight:700;

        }

        .stats{

            background:#1C3354;

        }

        footer{

            background:#16283d;

            color:white;

            padding:40px;

            text-align:center;

        }

        .navbar{

            background:white;

            box-shadow:0 3px 15px rgba(0,0,0,.08);

        }

        .navbar-brand{

            font-weight:700;

            color:#1C3354 !important;

        }

    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg fixed-top">

<div class="container">

<a class="navbar-brand" href="#">

<img src="{{ asset('images/logo.png') }}" width="45" class="me-2">

TerraBuild ERP

</a>

<div>

<a href="{{ route('login') }}" class="btn btn-outline-primary me-2">

Connexion

</a>

<a href="{{ route('register') }}" class="btn btn-primary">

Créer un compte

</a>

</div>

</div>

</nav>

<section class="hero">

<div class="container">

<div class="row align-items-center">

<div class="col-lg-7">

<h1>

Gérez vos projets BTP en toute simplicité.

</h1>

<p class="my-4">

TerraBuild ERP centralise les chantiers, les employés, les devis,
les factures, les paiements et les stocks dans une seule plateforme.

</p>

<a href="{{ route('login') }}" class="btn btn-gold">

<i class="fas fa-right-to-bracket"></i>

Se connecter

</a>

<a href="#modules" class="btn btn-outline-light ms-3">

Découvrir

</a>

</div>

</div>

</div>

</section>

<section id="modules">

<div class="container">

<h2 class="text-center title">

Modules du système

</h2>

<div class="row g-4">

@php

$modules=[

['users','Employés'],

['building','Chantiers'],

['diagram-project','Projets'],

['file-signature','Devis'],

['file-invoice-dollar','Factures'],

['money-check-dollar','Paiements'],

['truck','Véhicules'],

['warehouse','Stocks'],

['tools','Matériels'],

['industry','Fournisseurs'],

['users-gear','Équipes'],

['chart-line','Dashboard']

];

@endphp

@foreach($modules as $m)

<div class="col-lg-3 col-md-6">

<div class="feature">

<i class="fas fa-{{ $m[0] }}"></i>

<h5>

{{ $m[1] }}

</h5>

</div>

</div>

@endforeach

</div>

</div>

</section>

<section class="stats">

<div class="container">

<div class="row">

<div class="col-md-3 stat">

<h2>250+</h2>

<p>Projets</p>

</div>

<div class="col-md-3 stat">

<h2>180</h2>

<p>Employés</p>

</div>

<div class="col-md-3 stat">

<h2>500+</h2>

<p>Factures</p>

</div>

<div class="col-md-3 stat">

<h2>99%</h2>

<p>Disponibilité</p>

</div>

</div>

</div>

</section>

<section>

<div class="container">

<h2 class="text-center title">

Pourquoi choisir TerraBuild ?

</h2>

<div class="row">

<div class="col-lg-4">

<div class="feature">

<i class="fas fa-clock"></i>

<h4>Gain de temps</h4>

<p>

Automatisation des tâches administratives.

</p>

</div>

</div>

<div class="col-lg-4">

<div class="feature">

<i class="fas fa-shield-halved"></i>

<h4>Sécurité</h4>

<p>

Protection des données et accès sécurisé.

</p>

</div>

</div>

<div class="col-lg-4">

<div class="feature">

<i class="fas fa-chart-column"></i>

<h4>Suivi en temps réel</h4>

<p>

Analyse des performances de vos chantiers.

</p>

</div>

</div>

</div>

</div>

</section>

<footer>

<img src="{{ asset('images/logo.png') }}" width="70">

<h4 class="mt-3">

TerraBuild ERP

</h4>

<p>

Construction Management System

</p>

<p>

© {{ date('Y') }} TerraBuild ERP — Tous droits réservés.

</p>

</footer>

</body>

</html>