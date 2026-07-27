<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <title>@yield('title','TerraBuild ERP')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('images/logo.png') }}">

    <style>

        body{

            margin:0;
            background:#f4f6f9;
            font-family:Poppins,Arial,sans-serif;

        }

        .print-container{

            width:210mm;
            min-height:297mm;
            background:white;
            margin:20px auto;
            padding:40px;

            box-shadow:0 5px 25px rgba(0,0,0,.12);

        }

        .header{

            display:flex;
            justify-content:space-between;
            align-items:center;

            border-bottom:3px solid #C9962E;

            padding-bottom:20px;
            margin-bottom:40px;

        }

        .logo{

            display:flex;
            align-items:center;

        }

        .logo img{

            width:75px;
            margin-right:20px;

        }

        .logo h2{

            color:#1C3354;
            margin:0;

        }

        .company{

            text-align:right;
            color:#555;

        }

        .company h3{

            margin:0;
            color:#1C3354;

        }

        h1{

            color:#1C3354;

        }

        table{

            width:100%;
            border-collapse:collapse;
            margin-top:20px;

        }

        table th{

            background:#1C3354;
            color:white;
            padding:12px;

        }

        table td{

            padding:12px;
            border:1px solid #ddd;

        }

        .footer{

            margin-top:60px;
            text-align:center;
            color:#888;
            border-top:1px solid #ddd;
            padding-top:15px;

        }

    </style>

</head>

<body>
    <h1 style="background:red;color:white;text-align:center;padding:20px;">
</h1>

<div class="print-container">

    <div class="header">

        <div class="logo">

            <img src="{{ asset('images/logo.png') }}">

            <div>

                <h2>TerraBuild ERP</h2>

                <small>Construction Management System</small>

            </div>

        </div>

        <div class="company">

            <h3>TerraBuild SARL</h3>

            Avenue Mohammed VI<br>

            Marrakech - Maroc<br>

            +212 6 00 00 00 00<br>

            contact@terrabuild.ma

        </div>

    </div>

    @yield('content')

    <div class="footer">

        © {{ date('Y') }} TerraBuild ERP — Tous droits réservés

    </div>

</div>

</body>

</html>