@extends('layouts.master')
@section('title','Nouveau mouvement')

@section('content')

<div class="card">

    <div class="card-header bg-primary text-white">

        <h3 class="card-title">

            Ajouter un mouvement de stock

        </h3>

    </div>

    <div class="card-body">

        <form
            action="{{ route('stocks.store') }}"
            method="POST">

            @csrf

            @include('stocks.form')

        </form>

    </div>

</div>

@endsection