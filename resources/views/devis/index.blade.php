@extends('layouts.master')
@section('title', 'Devis')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title"><i class="fas fa-file-invoice"></i> Devis</h3>
        <a href="{{ route('devis.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Ajouter</a>
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
                    <th>Client</th>
                    <th>Projet</th>
                    <th>Montant</th>
                    <th>Statut</th>
                    <th width="220">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($devis as $devi)
                    <tr>
                        <td>{{ $devi->id }}</td>
                        <td>{{ $devi->client->nom ?? '-' }}</td>
                        <td>{{ $devi->projet->nom ?? '-' }}</td>
                        <td>{{ number_format($devi->montant, 2, ',', ' ') }}</td>
                        <td><span class="badge bg-info">{{ $devi->statut }}</span></td>
                        <td>
                            <a href="{{ route('devis.show', $devi) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('devis.edit', $devi) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('devis.destroy', $devi) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce devis ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">Aucun devis trouvé.</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $devis->links() }}
    </div>
</div>
@endsection
