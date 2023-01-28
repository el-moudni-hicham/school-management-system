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
    <div class="card-body">
        <form action="{{ route('enseignants.store.diplome',$enseignant_Id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="photo">Diplome PDF</label>
                <input type="file" class="form-control-file" name="file" id="photo">
            </div>
            <div class="form-group">
                <label for="libelle">Diplome</label>
                @if($errors->has('libelle'))
                        <p style="color: red">{{ $errors->first('libelle') }}</p>
                    @endif
                <input type="text" class="form-control" name="libelle" id="libelle" placeholder="Diplome">
            </div>
            <div class="form-group">
                <label for="theme">Type de diplome</label>
                @if($errors->has('theme'))
                        <p style="color: red">{{ $errors->first('theme') }}</p>
                    @endif
                <input type="text" class="form-control" name="theme" id="theme" placeholder="Type de diplome">
            </div>
            <div class="form-group">
                <label for="date_diplome">Date de diplome</label>
                @if($errors->has('date_diplome'))
                        <p style="color: red">{{ $errors->first('date_diplome') }}</p>
                    @endif
                <input type="date" class="form-control" name="date_diplome" id="date_diplome" placeholder="Date de diplome">
            </div>
            <div class="form-group">
                <label for="taux">Montant</label>
                @if($errors->has('taux'))
                        <p style="color: red">{{ $errors->first('taux') }}</p>
                    @endif
                <input type="number" class="form-control" name="taux" id="taux" placeholder="Saisir le taux">
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary">
                        Ajouter
                    </button>
                </div>
            </div>

          </form>
    </div>
</div>
@endsection
