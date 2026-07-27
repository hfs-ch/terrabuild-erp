@extends('layouts.master')
@section('title', 'Nouveau véhicule')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title"><i class="fas fa-plus"></i> Ajouter un véhicule</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('vehicules.store') }}" method="POST">
            @csrf
            @include('vehicules.form')
        </form>
    </div>
</div>
@endsection
