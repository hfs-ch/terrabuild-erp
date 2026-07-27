@extends('layouts.master')
@section('title','Modifier chantier')

@section('content')

<div class="card">

    <div class="card-header bg-warning">

        <h3 class="card-title">

            Modifier le chantier

        </h3>

    </div>

    <div class="card-body">

        <form
            action="{{ route('chantiers.update',$chantier) }}"
            method="POST">

            @csrf
            @method('PUT')

            @include('chantiers.form')

        </form>

    </div>

</div>

@endsection