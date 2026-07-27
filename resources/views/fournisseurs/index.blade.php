@extends('layouts.master')
@section('title', 'Fournisseurs')

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title"><i class="fas fa-truck"></i> Fournisseurs</h3>
        <a href="{{ route('fournisseurs.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Ajouter
        </a>
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
                    <th>Nom</th>
                    <th>Contact</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Spécialité</th>
                    <th>Statut</th>
                    <th width="220">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($fournisseurs as $fournisseur)
                    <tr>
                        <td>{{ $fournisseur->id }}</td>
                        <td>{{ $fournisseur->nom }}</td>
                        <td>{{ $fournisseur->contact ?? '-' }}</td>
                        <td>{{ $fournisseur->telephone ?? '-' }}</td>
                        <td>{{ $fournisseur->email ?? '-' }}</td>
                        <td>{{ $fournisseur->specialite ?? '-' }}</td>
                        <td>
                            <span class="badge {{ $fournisseur->statut === 'Actif' ? 'bg-success' : 'bg-secondary' }}">{{ $fournisseur->statut }}</span>
                        </td>
                        <td>
                            <a href="{{ route('fournisseurs.show', $fournisseur) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('fournisseurs.edit', $fournisseur) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('fournisseurs.destroy', $fournisseur) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce fournisseur ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="8" class="text-center">Aucun fournisseur trouvé.</td></tr>
                @endforelse
            </tbody>
        </table>

        {{ $fournisseurs->links() }}
    </div>
</div>

@endsection
