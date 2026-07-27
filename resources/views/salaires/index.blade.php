@extends('layouts.master')
@section('title', 'Salaires')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title"><i class="fas fa-money-bill"></i> Salaires</h3>
        <a href="{{ route('salaires.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Ajouter</a>
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
                    <th>Période</th>
                    <th>Base</th>
                    <th>Avance</th>
                    <th>Net</th>
                    <th width="220">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($salaires as $salaire)
                    <tr>
                        <td>{{ $salaire->id }}</td>
                        <td>{{ $salaire->employe->nom ?? '-' }}</td>
                        <td>{{ $salaire->periode }}</td>
                        <td>{{ number_format($salaire->salaire_base, 2, ',', ' ') }}</td>
                        <td>{{ number_format($salaire->avance, 2, ',', ' ') }}</td>
                        <td>{{ number_format($salaire->net_a_payer, 2, ',', ' ') }}</td>
                        <td>
                            <a href="{{ route('salaires.show', $salaire) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('salaires.edit', $salaire) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('salaires.destroy', $salaire) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce salaire ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center">Aucun salaire trouvé.</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $salaires->links() }}
    </div>
</div>
@endsection
