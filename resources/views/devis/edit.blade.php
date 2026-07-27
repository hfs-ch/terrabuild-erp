@extends('layouts.master')
@section('title', 'Modifier devis')

@section('content')
<div class="card">
    <div class="card-header bg-warning text-dark">
        <h3 class="card-title"><i class="fas fa-edit"></i> Modifier le devis</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('devis.update', $devis) }}" method="POST">
            @csrf
            @method('PUT')
            @include('devis.form')
        </form>
    </div>
</div>
@endsection
