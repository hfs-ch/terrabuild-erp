@extends('layouts.master')
@section('title','Matériels')

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">

    <div class="card-header">

        <a href="{{ route('materiels.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>

            Nouveau matériel

        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>

                    <th>ID</th>

                    <th>Nom</th>

                    <th>Catégorie</th>

                    <th>Marque</th>

                    <th>Quantité</th>

                    <th>État</th>

                    <th>Chantier</th>

                    <th width="220">Actions</th>

                </tr>

            </thead>

            <tbody>

            @forelse($materiels as $materiel)

                <tr>

                    <td>{{ $materiel->id }}</td>

                    <td>{{ $materiel->nom }}</td>

                    <td>{{ $materiel->categorie }}</td>

                    <td>{{ $materiel->marque }}</td>

                    <td>{{ $materiel->quantite }}</td>

                    <td>

                        @switch($materiel->etat)

                            @case('Disponible')

                                <span class="badge bg-success">

                                    Disponible

                                </span>

                            @break

                            @case('En service')

                                <span class="badge bg-primary">

                                    En service

                                </span>

                            @break

                            @default

                                <span class="badge bg-danger">

                                    Maintenance

                                </span>

                        @endswitch

                    </td>

                    <td>

                        {{ $materiel->chantier->nom ?? '-' }}

                    </td>

                    <td>

                        <a href="{{ route('materiels.show',$materiel) }}"
                           class="btn btn-info btn-sm">

                            Voir

                        </a>

                        <a href="{{ route('materiels.edit',$materiel) }}"
                           class="btn btn-warning btn-sm">

                            Modifier

                        </a>

                        <form
                            action="{{ route('materiels.destroy',$materiel) }}"
                            method="POST"
                            style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Supprimer ce matériel ?')">

                                Supprimer

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="8" class="text-center">

                        Aucun matériel trouvé.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        <br>

        {{ $materiels->links() }}

    </div>

</div>

@endsection