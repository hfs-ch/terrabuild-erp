@extends('layouts.master')
@section('title','Détails Équipe')

@section('content')

<div class="card">

    <div class="card-header bg-info text-white">

        <h3 class="card-title">

            {{ $equipe->nom }}

        </h3>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>

                <th>Nom</th>

                <td>{{ $equipe->nom }}</td>

            </tr>

            <tr>

                <th>Chef d'équipe</th>

                <td>{{ $equipe->chef_equipe }}</td>

            </tr>

            <tr>

                <th>Description</th>

                <td>{{ $equipe->description }}</td>

            </tr>

            <tr>

                <th>Chantier</th>

                <td>{{ $equipe->chantier->nom }}</td>

            </tr>

        </table>

        <a href="{{ route('equipes.index') }}"
           class="btn btn-secondary">

            Retour

        </a>

        <a href="{{ route('equipes.edit',$equipe) }}"
           class="btn btn-warning">

            Modifier

        </a>

    </div>
    <form action="{{ route('equipes.addMember',$equipe) }}" method="POST">
    @csrf

    <select name="employe_id" class="form-control">
        @foreach($employes as $employe)
            <option value="{{ $employe->id }}">
                {{ $employe->nom }}
            </option>
        @endforeach
    </select>

    <button class="btn btn-success mt-2">
        Ajouter
    </button>
</form>

<hr>

<h4>Membres</h4>

<table class="table">
@foreach($equipe->employes as $emp)
<tr>
<td>{{ $emp->nom }}</td>
<td>{{ $emp->poste }}</td>
</tr>
@endforeach
</table>

</div>

@endsection