@extends('layouts.master')
@section('title', 'Modifier le client')

@section('content')
<div class="card">
    <div class="card-header bg-warning">
        <h3 class="card-title">
            <i class="fas fa-edit"></i> Modifier le client
        </h3>
    </div>

    <div class="card-body">
        <form action="{{ route('clients.update', $client) }}" method="POST">
            @csrf
            @method('PUT')

            @include('clients.form')
        </form>
    </div>
    <div class="mt-3">

<button type="submit"
class="btn btn-primary">
Enregistrer
</button>

<a href="{{ route('clients.index') }}"
class="btn btn-secondary">
Retour
</a>

</div>
</div>
@endsection