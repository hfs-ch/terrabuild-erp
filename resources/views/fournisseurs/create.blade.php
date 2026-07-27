@extends('layouts.master')
@section('title', 'Nouveau fournisseur')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title"><i class="fas fa-plus"></i> Ajouter un fournisseur</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('fournisseurs.store') }}" method="POST">
            @csrf
            @include('fournisseurs.form')
        </form>
    </div>
</div>
@endsection
