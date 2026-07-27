@extends('layouts.master')
@section('title', 'Nouvelle tâche')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title"><i class="fas fa-plus"></i> Ajouter une tâche</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('taches.store') }}" method="POST">
            @csrf
            @include('taches.form')
        </form>
    </div>
</div>
@endsection
