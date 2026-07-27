@extends('layouts.master')
@section('title','Modifier équipe')

@section('content')

<div class="card">

    <div class="card-header bg-warning">

        <h3 class="card-title">

            Modifier l'équipe

        </h3>

    </div>

    <div class="card-body">

        <form
            action="{{ route('equipes.update',$equipe) }}"
            method="POST">

            @csrf
            @method('PUT')

            @include('equipes.form')

        </form>

    </div>

</div>

@endsection