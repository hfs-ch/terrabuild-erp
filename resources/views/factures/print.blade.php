<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Facture {{ $facture->reference }}</title>

    <style>
        body{font-family:Arial;margin:40px;}
        table{width:100%;border-collapse:collapse;}
        th,td{border:1px solid #ccc;padding:8px;}
        .right{text-align:right;}
    </style>
</head>
<body onload="window.print()">

<h2>FACTURE {{ $facture->reference }}</h2>

<p><strong>Client :</strong> {{ $facture->client->nom }}</p>

<p><strong>Date :</strong> {{ $facture->date_emission->format('d/m/Y') }}</p>

<table>
    <tr>
        <th>Désignation</th>
        <th>Qté</th>
        <th>PU</th>
        <th>Total</th>
    </tr>

    @foreach($facture->lignes as $ligne)
    <tr>
        <td>{{ $ligne->designation }}</td>
        <td>{{ $ligne->quantite }}</td>
        <td>{{ number_format($ligne->prix_unitaire,2) }}</td>
        <td>{{ number_format($ligne->total_ttc,2) }}</td>
    </tr>
    @endforeach
</table>

<h3 class="right">
    Total TTC : {{ number_format($facture->montant_ttc,2,',',' ') }} MAD
</h3>

</body>
</html>