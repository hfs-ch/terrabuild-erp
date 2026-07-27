@extends('layouts.master')
@section('title','Modifier mouvement')

@section('content')

<div class="card">

    <div class="card-header bg-warning">

        <h3 class="card-title">

            Modifier le mouvement

        </h3>

    </div>

    <div class="card-body">

        <form
            action="{{ route('stocks.update', $stock) }}"
            method="POST">

            @csrf
            @method('PUT')

            @include('stocks.form')

        </form>

    </div>

</div>

@endsection