@extends('layouts.master')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Liste des Clients</h2>

        <a href="{{ route('clients.create') }}" class="btn btn-primary">
            Nouveau Client
        </a>
    </div>

    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Ville</th>
                <th width="260">Actions</th>
            </tr>
        </thead>

        <tbody>

        @forelse($clients as $client)

            <tr>

                <td>{{ $client->id }}</td>
                <td>{{ $client->nom }}</td>
                <td>{{ $client->telephone }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->ville }}</td>

                <td>

                    <a href="{{ route('clients.show',$client) }}"
                       class="btn btn-info btn-sm">
                        Voir
                    </a>

                    <a href="{{ route('clients.edit',$client) }}"
                       class="btn btn-warning btn-sm">
                        Modifier
                    </a>

                    <form action="{{ route('clients.destroy',$client) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Supprimer ce client ?')">
                            Supprimer
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="6" class="text-center">
                    Aucun client trouvé.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

    {{ $clients->links() }}

</div>

@endsection