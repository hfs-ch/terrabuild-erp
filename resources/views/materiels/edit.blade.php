@extends('layouts.master')
@section('title','Modifier matériel')

@section('content')

<div class="card">

    <div class="card-header bg-warning">

        <h3 class="card-title">

            Modifier le matériel

        </h3>

    </div>

    <div class="card-body">

        <form
            action="{{ route('materiels.update',$materiel) }}"
            method="POST">

            @csrf
            @method('PUT')

            @include('materiels.form')

        </form>

    </div>

</div>

@endsection