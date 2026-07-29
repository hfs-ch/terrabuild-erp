@extends('layouts.master')



@section('content')

<h3>{{ $client->nom }}</h3>

<table class="table">

<tr>
<th>Téléphone</th>
<td>{{ $client->telephone }}</td>
</tr>

<tr>
<th>Email</th>
<td>{{ $client->email }}</td>
</tr>

<tr>
<th>Adresse</th>
<td>{{ $client->adresse }}</td>
</tr>

<tr>
<th>Ville</th>
<td>{{ $client->ville }}</td>
</tr>

</table>

<a href="{{ route('clients.index') }}"
class="btn btn-secondary">
Retour
</a>

@endsection