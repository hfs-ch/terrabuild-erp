@extends('adminlte::page')

@section('title', 'Modifier document')

@section('content')
<div class="card">
    <div class="card-header bg-warning text-dark">
        <h3 class="card-title"><i class="fas fa-edit"></i> Modifier le document</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('documents.update', $document) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('documents.form')
        </form>
    </div>
</div>
@endsection
