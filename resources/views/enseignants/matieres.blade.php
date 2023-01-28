@extends('adminlte::page')
@section('plugins.Datatables', true)
@extends('layouts.app2')

@section('style')

@endsection

@section('title')
    Affiche matieres| Gestion Des Enseignants
@endsection

@section('content_header')
    <h1>La liste des matieres</h1>

@stop

@section('content')
<div class="card my-3">
        <div class="card-body">
            <table  id="enseignants" class="table table-bordered table-striped" >
                <thead>
                    <tr>
                        <th scope="col">Libelle</th>
                        <th scope="col">Semestre</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($matieres as $item)
                    <tr>
                        <td>{{$item->libelle}}</td>
                        <td>{{$item->semestre}}</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

