@extends('layouts.master')
@section('title', 'Modifier paiement')

@section('content')
<div class="card">
    <div class="card-header bg-warning text-dark">
        <h3 class="card-title"><i class="fas fa-edit"></i> Modifier le paiement</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('paiements.update', $paiement) }}" method="POST">
            @csrf
            @method('PUT')
            @include('paiements.form')
        </form>
    </div>
</div>
@endsection
