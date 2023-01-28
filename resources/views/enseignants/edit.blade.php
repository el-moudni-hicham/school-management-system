@extends('adminlte::page')

@extends('layouts.app2')

@section('style')

@endsection

@section('title')
    Modifier | Gestion Des Enseignants
@endsection

@section('content_header')
    <h1>Modifier l'enseignant</h1>
@stop

@section('content')

    <!-- if validation in the controller fails, show the errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="card my-3">
        <div class="card-body">
            <form action="{{ route('enseignants.update', $enseignant->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nom">Nom</label>
                    @if($errors->has('nom'))
                        <p style="color: red">{{ $errors->first('nom') }}</p>
                    @endif
                    <input type="text" class="form-control" name="nom" id="nom" value="{{ $enseignant->nom }}">
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    @if($errors->has('prenom'))
                        <p style="color: red">{{ $errors->first('prenom') }}</p>
                    @endif
                    <input type="text" class="form-control" name="prenom" id="prenom" value="{{ $enseignant->prenom }}">
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    @if($errors->has('photo'))
                        <p style="color: red">{{ $errors->first('photo') }}</p>
                    @endif
                    <input type="file" class="form-control-file" name="file" value="{{ $enseignant->photo }}" id="photo">
                </div>
                <div class="form-group">
                    <label for="nom">CIN</label>
                    @if($errors->has('cin'))
                        <p style="color: red">{{ $errors->first('cin') }}</p>
                    @endif
                    <input type="text" class="form-control" name="cin" id="cin" value="{{ $enseignant->cin }}">
                </div>
                <div class="form-group">
                    <label for="date_naissance">Date de naissance</label>
                    @if($errors->has('date_naissance'))
                        <p style="color: red">{{ $errors->first('date_naissance') }}</p>
                    @endif
                    <input type="date" class="form-control" id="date_naissance" name ="date_naissance" value="{{ $enseignant->date_naissance }}">
                </div>
                <div class="form-group">
                    <label for="prenom">Sexe</label>
                    @if($errors->has('sexe'))
                        <p style="color: red">{{ $errors->first('sexe') }}</p>
                    @endif
                    <select id="prenom" name ="sexe" class="form-control">
                        <option>{{$enseignant->sexe}}</option>
                        <option>Homme</option>
                        <option>Femme</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="telephone">Téléphone</label>
                    @if($errors->has('telephone'))
                        <p style="color: red">{{ $errors->first('telephone') }}</p>
                    @endif
                    <input type="phone" class="form-control" name="telephone" id="telephone" value="{{ $enseignant->telephone }}">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    @if($errors->has('email'))
                        <p style="color: red">{{ $errors->first('email') }}</p>
                    @endif
                    <input type="email" class="form-control" name="email" id="email" value="{{ $enseignant->email }}">
                </div>
                <div class="form-group ">
                    <label for="telephone">Adresse</label>

                    <input type="text" class="form-control" name="adresse" id="adresse"
                    value="{{ $enseignant->adresse }}">
                </div>
                <div class="form-group">
                    <label for="date">Date d'éntrée dans l'établissement</label>
                    <input type="date" class="form-control" id="date" name ="date_service" value="{{ $enseignant->date_service }}">
                </div>
                <div class="form-group">
                    <label for="rib">RIB</label>
                    @if($errors->has('rib'))
                        <p style="color: red">{{ $errors->first('rib') }}</p>
                    @endif
                    <input type="text" class="form-control" name="rib" id="rib" value="{{ $enseignant->rib }}">
                </div>
                <div class="form-group">
                    <label class="form-label fw-bold" for="matiere">Matiere</label>
                    <select class="form-control" name='matieres[]'>
                        
                        @foreach ($matieres as $key => $matiere)
                            <option value="{{ $matiere->id }}">{{ $matiere->libelle }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary">
                            Modifier
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
