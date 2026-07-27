@extends('layouts.master')
@section('content')

<div class="container">

<h2>Nouveau client</h2>

<form action="{{ route('clients.store') }}" method="POST">

@csrf

@include('clients.form')

<button class="btn btn-success">

Enregistrer

</button>

</form>

</div>

@endsection