@extends('layouts.master')
@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Gestion des employés</h2>

        <a href="{{ route('employes.create') }}" class="btn btn-primary">
            + Ajouter un employé
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

        <tr>
            <th>ID</th>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Poste</th>
            <th>Téléphone</th>
            <th>Salaire</th>
            <th>Actions</th>
        </tr>

        </thead>

        <tbody>

        @forelse($employes as $employe)

            <tr>

                <td>{{ $employe->id }}</td>
                <td>{{ $employe->matricule }}</td>
                <td>{{ $employe->nom }}</td>
                <td>{{ $employe->prenom }}</td>
                <td>{{ $employe->poste }}</td>
                <td>{{ $employe->telephone }}</td>
                <td>{{ number_format($employe->salaire,2) }} MAD</td>

                <td>

                    <a href="{{ route('employes.edit',$employe) }}"
                       class="btn btn-warning btn-sm">
                        Modifier
                    </a>

                    <form action="{{ route('employes.destroy',$employe) }}"
                          method="POST"
                          style="display:inline">

                        @csrf
                        @method('DELETE')

                        <button
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Supprimer cet employé ?')">
                            Supprimer
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="8" class="text-center">
                    Aucun employé trouvé.
                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

    {{ $employes->links() }}

</div>

@endsection