@extends('layouts.master')
@section('title', 'Modifier fournisseur')

@section('content')
<div class="card">
    <div class="card-header bg-warning text-dark">
        <h3 class="card-title"><i class="fas fa-edit"></i> Modifier le fournisseur</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('fournisseurs.update', $fournisseur) }}" method="POST">
            @csrf
            @method('PUT')
            @include('fournisseurs.form')
        </form>
    </div>
</div>
@endsection
