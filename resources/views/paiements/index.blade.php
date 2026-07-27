@extends('layouts.master')
@section('title', 'Paiements')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title"><i class="fas fa-credit-card"></i> Paiements</h3>
        <a href="{{ route('paiements.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Ajouter</a>
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
                    <th>Facture</th>
                    <th>Montant</th>
                    <th>Date</th>
                    <th>Moyen</th>
                    <th width="220">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($paiements as $paiement)
                    <tr>
                        <td>{{ $paiement->id }}</td>
                        <td>{{ $paiement->facture->id ?? '-' }}</td>
                        <td>{{ number_format($paiement->montant, 2, ',', ' ') }}</td>
                        <td>{{ $paiement->date_paiement?->format('d/m/Y') }}</td>
                        <td>{{ $paiement->moyen_paiement ?? '-' }}</td>
                        <td>
                            <a href="{{ route('paiements.show', $paiement) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('paiements.edit', $paiement) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('paiements.destroy', $paiement) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce paiement ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">Aucun paiement trouvé.</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $paiements->links() }}
    </div>
</div>
@endsection
