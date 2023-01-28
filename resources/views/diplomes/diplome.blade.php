@extends('adminlte::page')

@extends('layouts.app2')

@section('style')

@endsection

@section('title')
    diplome | Gestion Des Enseignants
@endsection

@section('content_header')
    <h1>Ajouter un diplome</h1>
@stop

@section('content')
    <div class="card my-3">
        <div class="card-header">
            <h3 class="text-center text-uppercase">
                Diplome
            </h3>
        </div>
        <div class="card-body">
            <table id="enseignants" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Numéro d'ordre</th>
                        <th scope="col">fichier</th>
                        <th scope="col">libelle</th>
                        <th scope="col">Type de diplome</th>
                        <th scope="col">Date de diplome</th>
                        <th scope="col">Montant</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($enseignant->Diplomes as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                <a href="{{ route('diplomes.show', $item->id) }}" class="btn btn-sm btn-danger">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                            </td>

                            <td>{{ $item->libelle }}</td>
                            <td>{{ $item->theme }}</td>
                            <td>{{ $item->date_diplome }}</td>
                            <td>{{ $item->taux }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
