@extends('adminlte::page')

@extends('layouts.app2')

@section('style')

@endsection

@section('title')
    Ajouter | Gestion Des Enseignants
@endsection

@section('content_header')
    <h1>Ajouter un enseignant</h1>
@stop

@section('content')
    <div class="card my-3">
        <div class="card-body">
            <form action="{{ route('enseignants.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nom">Nom</label>
                    @if($errors->has('nom'))
                        <p style="color: red">{{ $errors->first('nom') }}</p>
                    @endif
                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Saisir le nom" value="{{ old('nom') }}">
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    @if($errors->has('prenom'))
                        <p style="color: red">{{ $errors->first('prenom') }}</p>
                    @endif
                    <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Saisir le prenom" value="{{ old('prenom') }}">
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    @if($errors->has('photo'))
                        <p style="color: red">{{ $errors->first('photo') }}</p>
                    @endif
                    <input type="file" class="form-control-file" name="file" id="photo" value="{{ old('file') }}">
                </div>
                <div class="form-group">
                    <label for="nom">CIN</label>
                    @if($errors->has('cin'))
                        <p style="color: red">{{ $errors->first('cin') }}</p>
                    @endif
                    <input type="text" class="form-control" name="cin" id="cin" placeholder="Saisir le cin" value="{{ old('cin') }}">
                </div>
                <div class="form-group">
                    <label for="date_naissance">Date de naissance</label>
                    @if($errors->has('date_naissance'))
                        <p style="color: red">{{ $errors->first('date_naissance') }}</p>
                    @endif
                    <input type="date" class="form-control" name="date_naissance" id="date_naissance"
                        placeholder="Saisir la date de naissance" value="{{ old('date_naissance') }}">
                </div>
                <div class="form-group">
                    <label for="sexe">Sexe</label>
                    @if($errors->has('sexe'))
                        <p style="color: red">{{ $errors->first('sexe') }}</p>
                    @endif
                    <select class="form-select" name="sexe" id="sexe" aria-label="Default select example">
                        @if($errors->any())
                        <option selected>{{ old('sexe') }}</option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                        @else
                        <option selected>-- Choisir --</option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="telephone">Téléphone</label>
                    @if($errors->has('telephone'))
                        <p style="color: red">{{ $errors->first('telephone') }}</p>
                    @endif
                    <input type="text" class="form-control" name="telephone" id="telephone"
                        placeholder="Saisir le telephone" value="{{ old('telephone') }}">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    @if($errors->has('email'))
                        <p style="color: red">{{ $errors->first('email') }}</p>
                    @endif
                    <input type="email" class="form-control" name="email" id="email" placeholder="Saisir l'email" value="{{ old('email') }}">
                </div>
                <div class="form-group ">
                    <label for="adresse">Adresse</label>
                    @if($errors->has('adresse'))
                        <p style="color: red">{{ $errors->first('adresse') }}</p>
                    @endif
                    <input type="text" class="form-control" name="adresse" id="adresse"
                        placeholder="Saisir l'adresse" value="{{ old('adresse') }}">
                </div>
                <div class="form-group">
                    <label for="date">Date d'éntrée dans l'établissement</label>
                    @if($errors->has('date_service'))
                        <p style="color: red">{{ $errors->first('date_service') }}</p>
                    @endif
                    <input type="date" class="form-control" name="date_service" id="date_service"
                        placeholder="Saisir la date d'éntrée dans l'établissement" value="{{ old('date_service') }}">
                </div>
                <div class="form-group">
                    <label for="rib">RIB</label>
                    @if($errors->has('rib'))
                        <p style="color: red">{{ $errors->first('rib') }}</p>
                    @endif
                    <input type="text" class="form-control" name="rib" id="rib" placeholder="Saisir le rib" value="{{ old('rib') }}">
                </div>
                <div class="form-group">
                    <script type="text/javascript">
                        $('#example-multiple-selected').multiselect();
                    </script>
                    <!-- Note the missing multiple attribute! -->
                    <select id="example-multiple-selected" multiple="multiple">
                        <option value="1">Option 1</option>
                        <option value="2" selected="selected">Option 2</option>
                        <!-- Option 3 will be selected in advance ... -->
                        <option value="3" selected="selected">Option 3</option>
                        <option value="4">Option 4</option>
                        <option value="5">Option 5</option>
                        <option value="6">Option 6</option>
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
@section('js')
<!-- Initialize the plugin: -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#matiere').multiselect();
    });
</script>
@endsection
