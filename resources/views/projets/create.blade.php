@extends('layouts.master')
@section('title', 'Nouveau Projet')

@section('content')

<div class="card">

    <div class="card-header bg-primary text-white">

        <h3 class="card-title">Ajouter un projet</h3>

    </div>

    <div class="card-body">

        <form action="{{ route('projets.store') }}" method="POST">

            @csrf

            @include('projets.form')

        </form>

    </div>

</div>

@endsection