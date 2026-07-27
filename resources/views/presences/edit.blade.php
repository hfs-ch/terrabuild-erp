@extends('layouts.master')
@section('title', 'Modifier présence')

@section('content')
<div class="card">
    <div class="card-header bg-warning text-dark">
        <h3 class="card-title"><i class="fas fa-edit"></i> Modifier la présence</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('presences.update', $presence) }}" method="POST">
            @csrf
            @method('PUT')
            @include('presences.form')
        </form>
    </div>
</div>
@endsection
