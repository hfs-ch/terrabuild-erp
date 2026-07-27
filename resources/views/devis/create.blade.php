@extends('layouts.master')
@section('title', 'Nouveau devis')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title"><i class="fas fa-plus"></i> Ajouter un devis</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('devis.store') }}" method="POST">
            @csrf
            @include('devis.form')
        </form>
    </div>
</div>
@endsection
