@extends('adminlte::page')

@section('title', 'Documents')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title"><i class="fas fa-folder-open"></i> Documents</h3>
        <a href="{{ route('documents.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Ajouter</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Projet</th>
                    <th>Téléchargement</th>
                    <th width="220">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($documents as $document)
                    <tr>
                        <td>{{ $document->id }}</td>
                        <td>{{ $document->nom }}</td>
                        <td>{{ $document->type }}</td>
                        <td>{{ $document->projet->nom ?? '-' }}</td>
                        <td><a href="{{ route('documents.download', $document) }}" class="btn btn-success btn-sm">Télécharger</a></td>
                        <td>
                            <a href="{{ route('documents.show', $document) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('documents.edit', $document) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('documents.destroy', $document) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce document ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">Aucun document trouvé.</td></tr>
                @endforelse
            </tbody>
        </table>
        {{ $documents->links() }}
    </div>
</div>
@endsection
