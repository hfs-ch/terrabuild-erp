@extends('layouts.master')
@section('title','Équipes')

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">

    <div class="card-header">

        <a href="{{ route('equipes.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>

            Nouvelle équipe

        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>

                    <th>ID</th>

                    <th>Nom</th>

                    <th>Chef d'équipe</th>

                    <th>Chantier</th>

                    <th width="220">Actions</th>

                </tr>

            </thead>

            <tbody>

            @forelse($equipes as $equipe)

                <tr>

                    <td>{{ $equipe->id }}</td>

                    <td>{{ $equipe->nom }}</td>

                    <td>{{ $equipe->chef_equipe }}</td>

                    <td>{{ $equipe->chantier->nom }}</td>

                    <td>

                        <a href="{{ route('equipes.show',$equipe) }}"
                           class="btn btn-info btn-sm">

                            Voir

                        </a>

                        <a href="{{ route('equipes.edit',$equipe) }}"
                           class="btn btn-warning btn-sm">

                            Modifier

                        </a>

                        <form action="{{ route('equipes.destroy',$equipe) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Supprimer cette équipe ?')">

                                Supprimer

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center">

                        Aucune équipe trouvée.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        <br>

        {{ $equipes->links() }}

    </div>

</div>

@endsection