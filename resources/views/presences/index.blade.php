@extends('layouts.master')
@section('title', 'Présences')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title"><i class="fas fa-calendar-check"></i> Présences</h3>
        <a href="{{ route('presences.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Ajouter</a>
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
                    <th>Employé</th>
                    <th>Date</th>
                    <th>Heure entrée</th>
                    <th>Heure sortie</th>
                    <th>Statut</th>
                    <th width="220">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($presences as $presence)
                    <tr>
                        <td>{{ $presence->id }}</td>
                        <td>{{ $presence->employe->nom ?? '-' }}</td>
                        <td>{{ $presence->date?->format('d/m/Y') }}</td>
                        <td>{{ $presence->heure_entree ?? '-' }}</td>
                        <td>{{ $presence->heure_sortie ?? '-' }}</td>
                        <td><span class="badge bg-success">{{ $presence->statut }}</span></td>
                        <td>
                            <a href="{{ route('presences.show', $presence) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('presences.edit', $presence) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('presences.destroy', $presence) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette présence ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center">Aucune présence trouvée.</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $presences->links() }}
    </div>
</div>
@endsection
