@extends('layouts.master')
@section('content')

<div class="container">

    <div class="card">

        <div class="card-header bg-primary text-white">
            Ajouter un employé
        </div>

        <div class="card-body">

            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="{{ route('employes.store') }}" method="POST">

                @include('employes.form')

            </form>

        </div>

    </div>

</div>

@endsection