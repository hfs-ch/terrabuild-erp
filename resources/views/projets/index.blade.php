@extends('layouts.master')
@section('title', 'Projets')

@section('content')

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<div class="card">

    <div class="card-header">

        <a href="{{ route('projets.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>

            Nouveau Projet

        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

            <tr>

                <th>ID</th>

                <th>Référence</th>

                <th>Nom</th>

                <th>Client</th>

                <th>Début</th>

                <th>Fin</th>

                <th>Budget</th>

                <th>Statut</th>

                <th width="220">Actions</th>

            </tr>

            </thead>

            <tbody>

            @forelse($projets as $projet)

                <tr>

                    <td>{{ $projet->id }}</td>

                    <td>{{ $projet->reference }}</td>

                    <td>{{ $projet->nom }}</td>

                    <td>{{ $projet->client->nom }}</td>

                    <td>{{ $projet->date_debut }}</td>

                    <td>{{ $projet->date_fin }}</td>

                    <td>{{ number_format($projet->budget,2) }} MAD</td>

                    <td>

                        @switch($projet->statut)

                            @case('En attente')

                                <span class="badge bg-secondary">

                                    En attente

                                </span>

                                @break

                            @case('En cours')

                                <span class="badge bg-primary">

                                    En cours

                                </span>

                                @break

                            @case('Terminé')

                                <span class="badge bg-success">

                                    Terminé

                                </span>

                                @break

                            @default

                                <span class="badge bg-danger">

                                    Suspendu

                                </span>

                        @endswitch

                    </td>

                    <td>

                        <a href="{{ route('projets.show',$projet) }}"
                           class="btn btn-info btn-sm">

                            Voir

                        </a>

                        <a href="{{ route('projets.edit',$projet) }}"
                           class="btn btn-warning btn-sm">

                            Modifier

                        </a>

                        <form action="{{ route('projets.destroy',$projet) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Supprimer ce projet ?')">

                                Supprimer

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="9" class="text-center">

                        Aucun projet enregistré.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        <br>

        {{ $projets->links() }}

    </div>

</div>

@endsection