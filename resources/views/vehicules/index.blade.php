@extends('layouts.master')
@section('title', 'Véhicules')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title"><i class="fas fa-truck"></i> Véhicules</h3>
        <a href="{{ route('vehicules.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Ajouter</a>
    </div>
    <div class="card-body">
        <form method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" value="{{ $search ?? '' }}" class="form-control" placeholder="Rechercher...">
                <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Immatriculation</th>
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Type</th>
                    <th>Chauffeur</th>
                    <th>Statut</th>
                    <th>Chantier</th>
                    <th width="220">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vehicules as $vehicule)
                    <tr>
                        <td>{{ $vehicule->id }}</td>
                        <td>{{ $vehicule->immatriculation }}</td>
                        <td>{{ $vehicule->marque }}</td>
                        <td>{{ $vehicule->modele ?? '-' }}</td>
                        <td>{{ $vehicule->type }}</td>
                        <td>{{ $vehicule->chauffeur ?? '-' }}</td>
                        <td><span class="badge {{ $vehicule->statut === 'Disponible' ? 'bg-success' : 'bg-warning' }}">{{ $vehicule->statut }}</span></td>
                        <td>{{ $vehicule->chantier->nom ?? '-' }}</td>
                        <td>
                            <a href="{{ route('vehicules.show', $vehicule) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('vehicules.edit', $vehicule) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('vehicules.destroy', $vehicule) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce véhicule ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="9" class="text-center">Aucun véhicule trouvé.</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $vehicules->links() }}
    </div>
</div>
@endsection
