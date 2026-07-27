@extends('layouts.master')
@section('title', 'Modifier véhicule')

@section('content')
<div class="card">
    <div class="card-header bg-warning text-dark">
        <h3 class="card-title"><i class="fas fa-edit"></i> Modifier le véhicule</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('vehicules.update', $vehicule) }}" method="POST">
            @csrf
            @method('PUT')
            @include('vehicules.form')
        </form>
    </div>
</div>
@endsection
