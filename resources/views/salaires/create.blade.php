@extends('layouts.master')
@section('title', 'Nouveau salaire')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title"><i class="fas fa-plus"></i> Ajouter un salaire</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('salaires.store') }}" method="POST">
            @csrf
            @include('salaires.form')
        </form>
    </div>
</div>
@endsection
