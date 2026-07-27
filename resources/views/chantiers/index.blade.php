@extends('layouts.master')
@section('title', 'Chantiers')

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">

    <div class="card-header">

        <a href="{{ route('chantiers.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>

            Nouveau chantier

        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>

                    <th>ID</th>

                    <th>Référence</th>

                    <th>Nom</th>

                    <th>Projet</th>

                    <th>Date début</th>

                    <th>Date fin</th>

                    <th>Budget</th>

                    <th>Statut</th>

                    <th width="220">Actions</th>

                </tr>

            </thead>

            <tbody>

            @forelse($chantiers as $chantier)

                <tr>

                    <td>{{ $chantier->id }}</td>

                    <td>{{ $chantier->reference }}</td>

                    <td>{{ $chantier->nom }}</td>

                    <td>{{ $chantier->projet->nom }}</td>

                    <td>{{ $chantier->date_debut }}</td>

                    <td>{{ $chantier->date_fin }}</td>

                    <td>{{ number_format($chantier->budget,2) }} MAD</td>

                    <td>

                        @switch($chantier->statut)

                            @case('En préparation')

                                <span class="badge bg-secondary">
                                    En préparation
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

                        <a href="{{ route('chantiers.show',$chantier) }}"
                           class="btn btn-info btn-sm">

                            Voir

                        </a>

                        <a href="{{ route('chantiers.edit',$chantier) }}"
                           class="btn btn-warning btn-sm">

                            Modifier

                        </a>

                        <form action="{{ route('chantiers.destroy',$chantier) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Supprimer ce chantier ?')">

                                Supprimer

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="9" class="text-center">

                        Aucun chantier trouvé.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        <br>

        {{ $chantiers->links() }}

    </div>

</div>

@endsection