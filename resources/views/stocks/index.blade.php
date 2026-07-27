@extends('layouts.master')
@section('title','Stocks')

@section('content')

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<div class="card">

    <div class="card-header">

        <a href="{{ route('stocks.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>

            Nouveau mouvement

        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>

                    <th>ID</th>

                    <th>Matériel</th>

                    <th>Type</th>

                    <th>Quantité</th>

                    <th>Date</th>

                    <th>Référence</th>

                    <th width="220">Actions</th>

                </tr>

            </thead>

            <tbody>

            @forelse($stocks as $stock)

                <tr>

                    <td>{{ $stock->id }}</td>

                    <td>{{ $stock->materiel->nom }}</td>

                    <td>

                        @if($stock->type=='Entrée')

                            <span class="badge bg-success">

                                Entrée

                            </span>

                        @else

                            <span class="badge bg-danger">

                                Sortie

                            </span>

                        @endif

                    </td>

                    <td>{{ $stock->quantite }}</td>

                    <td>{{ $stock->date_mouvement }}</td>

                    <td>{{ $stock->reference }}</td>

                    <td>

                        <a
                            href="{{ route('stocks.show',$stock) }}"
                            class="btn btn-info btn-sm">

                            Voir

                        </a>

                        <a
                            href="{{ route('stocks.edit',$stock) }}"
                            class="btn btn-warning btn-sm">

                            Modifier

                        </a>

                        <form
                            action="{{ route('stocks.destroy',$stock) }}"
                            method="POST"
                            style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Supprimer ce mouvement ?')">

                                Supprimer

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7" class="text-center">

                        Aucun mouvement trouvé.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        <br>

        {{ $stocks->links() }}

    </div>

</div>

@endsection