@extends('layouts.master')
@section('title', 'Modifier tâche')

@section('content')
<div class="card">
    <div class="card-header bg-warning text-dark">
        <h3 class="card-title"><i class="fas fa-edit"></i> Modifier la tâche</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('taches.update', ['tache' => $tache->id]) }}" method="POST">
            @csrf
            @method('PUT')
            @include('taches.form')
        </form>
    </div>
</div>
@endsection
