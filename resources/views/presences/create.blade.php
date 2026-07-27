@extends('layouts.master')
@section('title', 'Nouvelle présence')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title"><i class="fas fa-plus"></i> Ajouter une présence</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('presences.store') }}" method="POST">
            @csrf
            @include('presences.form')
        </form>
    </div>
</div>
@endsection
