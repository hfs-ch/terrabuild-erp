@extends('layouts.master')
@section('title','Ajouter un chantier')

@section('content')

<div class="card">

    <div class="card-header bg-primary text-white">

        <h3 class="card-title">

            Nouveau chantier

        </h3>

    </div>

    <div class="card-body">

        <form
            action="{{ route('chantiers.store') }}"
            method="POST">

            @csrf

            @include('chantiers.form')

        </form>

    </div>

</div>

@endsection