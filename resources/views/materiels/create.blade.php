@extends('layouts.master')
@section('title','Nouveau matériel')

@section('content')

<div class="card">

    <div class="card-header bg-primary text-white">

        <h3 class="card-title">

            Ajouter un matériel

        </h3>

    </div>

    <div class="card-body">

        <form
            action="{{ route('materiels.store') }}"
            method="POST">

            @csrf

            @include('materiels.form')

        </form>

    </div>

</div>

@endsection