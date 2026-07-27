@extends('layouts.master')
@section('title', 'Factures')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title"><i class="fas fa-file-invoice-dollar"></i> Factures</h3>
        <a href="{{ route('factures.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Ajouter</a>
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
                @forelse($factures as $facture)
                    <tr>
                        <td>{{ $facture->id }}</td>
                        <td>{{ $facture->client->nom ?? '-' }}</td>
                        <td>{{ $facture->projet->nom ?? '-' }}</td>
                        <td>{{ number_format($facture->montant, 2, ',', ' ') }}</td>
                        <td><span class="badge bg-warning">{{ $facture->statut }}</span></td>
                        <td>
                            <a href="{{ route('factures.show', $facture) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('factures.edit', $facture) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('factures.destroy', $facture) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette facture ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">Aucune facture trouvée.</td></tr>
                @endforelse
            </tbody>
        </table>
        <a href="
   class="btn btn-secondary btn-sm"
   target="_blank">
    <i class="fas fa-print"></i>
</a>
        {{ $factures->links() }}
    </div>
</div>
@endsection
