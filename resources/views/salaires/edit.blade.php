@extends('layouts.master')
@section('title', 'Modifier salaire')

@section('content')
<div class="card">
    <div class="card-header bg-warning text-dark">
        <h3 class="card-title"><i class="fas fa-edit"></i> Modifier le salaire</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('salaires.update', $salaire) }}" method="POST">
            @csrf
            @method('PUT')
            @include('salaires.form')
        </form>
    </div>
</div>
@endsection
