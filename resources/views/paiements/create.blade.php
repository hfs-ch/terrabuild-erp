@extends('layouts.master')
@section('title', 'Nouveau paiement')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title"><i class="fas fa-plus"></i> Ajouter un paiement</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('paiements.store') }}" method="POST">
            @csrf
            @include('paiements.form')
        </form>
    </div>
</div>
@endsection
