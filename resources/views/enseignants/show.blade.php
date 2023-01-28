@extends('adminlte::page')

@extends('layouts.app2')

@section('style')

@endsection

@section('title')
    Afficher | Gestion Des Enseignants
@endsection

@section('content_header')
    <h1>Afficher l'enseignant</h1>
@stop

@section('content')

    <div class="card my-3">
        <div class="card-header">

            <h3 class="text-center text-uppercase">
                {{ $enseignant->nom }} {{ $enseignant->prenom }}
            </h3>

            <img src="/storage/enseignant/{{ $enseignant->photo }}" width="100" height="100" onerror="this.style.display='none'"/>

            <div class=" mt-3">
                <a href="{{route("enseignant.matieres",$enseignant->id)}}"
                    class="btn btn-outline-primary center mx-2">
                    Matiere
                </a>
                <a href="{{ route('enseignants.diplome', $enseignant->id) }}"
                    class="btn btn-outline-success center mx-2">
                    Diplome
                </a>
                <a href="{{ route('attestation', $enseignant->id) }}" class="btn btn-outline-danger center mx-2">CONVENTION DE VACATION</a>
            </div>
        </div>
        <div class="card-body">

            <div class="form-group">
                <label for="nom">Nom</label>
                <input class="form-control" id="nom" value="{{ $enseignant->nom }}" disabled>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input class="form-control" id="prenom" value="{{ $enseignant->prenom }}" disabled>
            </div>
            <div class="form-group">
                <label for="nom">CIN</label>
                <input class="form-control" id="cin" value="{{ $enseignant->cin }}" disabled>
            </div>
            <div class="form-group">
                <label for="date_naissance">Date de naissance</label>
                <input class="form-control" id="date_naissance" value="{{ $enseignant->date_naissance }}" disabled>
            </div>
            <div class="form-group">
                <label for="sexe">Sexe</label>
                <input class="form-control" id="sexe" value="{{ $enseignant->sexe }}" disabled>
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input class="form-control" id="telephone" value="{{ $enseignant->telephone }}" disabled>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input class="form-control" id="email" value="{{ $enseignant->email }}" disabled>
            </div>
            <div class="form-group">
                <label for="email">Adresse</label>
                <input class="form-control" id="email" value="{{ $enseignant->adresse }}" disabled>
            </div>
            <div class="form-group">
                <label for="date">Date d'éntrée dans l'établissement</label>
                <input class="form-control" id="date" value="{{ $enseignant->date_service }}" disabled>
            </div>
            {{-- <div class="form-group">
                <label for="type_ens">Type</label>
                <input class="form-control" id="type_ens" value="{{ $enseignant->type_ens }}" disabled>
            </div> --}}
            <div class="form-group">
                <label for="email">RIB</label>
                <input class="form-control" id="rib" value="{{ $enseignant->rib }}" disabled>
            </div>
            <div class="form-group">
                <label for="matiere">Matiere</label>
                @forelse ($enseignant->matieres as $item )
                    <input class="form-control" id="matiere" value="{{ $item->libelle }}" disabled>
                @empty
                    <input class="form-control" id="matiere" value="aucun matiere" disabled>
                @endforelse

            </div>

        </div>
    @endsection
