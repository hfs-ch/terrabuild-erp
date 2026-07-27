@extends('layouts.master')
@section('title', 'Modifier facture')

@section('content')
<div class="card">
    <div class="card-header bg-warning text-dark">
        <h3 class="card-title"><i class="fas fa-edit"></i> Modifier la facture</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('factures.update', $facture) }}" method="POST">
            @csrf
            @method('PUT')
            @include('factures.form')
        </form>
    </div>
</div>
@endsection
