@extends('adminlte::page')

@extends('layouts.app2')

@section('style')

@endsection

@section('title')
    Ajouter un diplome | Gestion Des Enseignants
@endsection

@section('content_header')
    <h1>Ajouter un diplome</h1>
@stop

@section('content')
    <div class="card my-3">
        <div class="card-header">
            <h3 class="text-center text-uppercase">
                {{ $diplome->libelle }}
            </h3>
            <iframe src="/storage/diplome/{{ $diplome->file }}" frameborder="0" height="800" width="95%"></iframe>
        </div>
    </div>
@endsection
