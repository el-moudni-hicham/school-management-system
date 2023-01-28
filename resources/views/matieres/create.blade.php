@extends('adminlte::page')

@extends('layouts.app2')

@section('style')

@endsection

@section('title')
    Ajout matière| Gestion Des Enseignants
@endsection

@section('content_header')
    <h1>Ajouter une matière</h1>
@stop

@section('content')
    <div class="card my-3">
        <div class="card-body">
            <form action="{{ route('matieres.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="libelle">Libelle</label>
                    @if($errors->has('libelle'))
                        <p style="color: red">{{ $errors->first('libelle') }}</p>
                    @endif
                    <input type="text" class="form-control" name="libelle" id="libelle" placeholder="Saisir le libelle" value="{{ old('libelle') }}">

                </div>
                <div class="form-group">
                    <label for="semestre">Semestre</label>
                    @if($errors->has('semestre'))
                        <p style="color: red">{{ $errors->first('semestre') }}</p>
                    @endif
                    <select name="semestre" id="semestre" class="form-control">
                        <option>S1</option>
                        <option>S2</option>
                        <option>S3</option>
                        <option>S4</option>
                        <option>S5</option>
                        <option>S6</option>
                        <option>S7</option>
                        <option>S8</option>
                        <option>S9</option>
                        <option>S10</option>
                    </select>
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
