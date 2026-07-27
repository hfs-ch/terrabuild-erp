@extends('layouts.master')
@section('title','Nouvelle équipe')

@section('content')

<div class="card">

    <div class="card-header bg-primary text-white">

        <h3 class="card-title">

            Ajouter une équipe

        </h3>

    </div>

    <div class="card-body">

        <form
            action="{{ route('equipes.store') }}"
            method="POST">

            @csrf

            @include('equipes.form')

        </form>

    </div>

</div>

@endsection