@extends('layouts.master')
@section('title', 'Modifier Projet')

@section('content')

<div class="card">

    <div class="card-header bg-warning">

        <h3 class="card-title">Modifier le projet</h3>

    </div>

    <div class="card-body">

        <form action="{{ route('projets.update',$projet) }}" method="POST">

            @csrf
            @method('PUT')

            @include('projets.form')

        </form>

    </div>

</div>

@endsection