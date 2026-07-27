@extends('layouts.master')
@section('title','Nouvelle Facture')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h3 class="mb-0">
                <i class="fas fa-file-invoice"></i>
                Nouvelle Facture
            </h3>

        </div>

        <div class="card-body">

            <form action="{{ route('factures.store') }}" method="POST">

                @csrf

                @include('factures.form')

            </form>

        </div>

    </div>

</div>

@endsection