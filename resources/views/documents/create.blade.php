@extends('adminlte::page')

@section('title', 'Nouveau document')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title"><i class="fas fa-plus"></i> Ajouter un document</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('documents.form')
        </form>
    </div>
</div>
@endsection
