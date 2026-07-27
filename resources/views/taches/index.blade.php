@extends('layouts.master')
@section('title', 'Tâches')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title"><i class="fas fa-tasks"></i> Tâches</h3>
        <a href="{{ route('taches.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Ajouter</a>
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
                    <th>Titre</th>
                    <th>Chantier</th>
                    <th>Employé</th>
                    <th>Date début</th>
                    <th>Statut</th>
                    <th>Priorité</th>
                    <th width="220">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($taches as $tache)
                    <tr>
                        <td>{{ $tache->id }}</td>
                        <td>{{ $tache->titre }}</td>
                        <td>{{ $tache->chantier->nom ?? '-' }}</td>
                        <td>{{ $tache->employe->nom ?? '-' }}</td>
                        <td>{{ $tache->date_debut?->format('d/m/Y') }}</td>
                        <td><span class="badge bg-info">{{ $tache->statut }}</span></td>
                        <td><span class="badge bg-secondary">{{ $tache->priorite }}</span></td>
                        <td>
                            <a href="{{ route('taches.show', $tache) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('taches.edit', $tache) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('taches.destroy', $tache) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette tâche ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="8" class="text-center">Aucune tâche trouvée.</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $taches->links() }}
    </div>
</div>
@endsection
