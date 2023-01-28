@extends('adminlte::page')
@section('plugins.Datatables', true)
@extends('layouts.app2')

@section('style')

@endsection

@section('title')
    Affiche diplomes | Gestion Des Enseignants
@endsection

@section('content_header')
    <h1>La liste des diplomes</h1>

@stop

@section('content')
<div class="card my-3">
        <div class="card-header">
            <h3 class="text-center text-uppercase">
                Diplomes
            </h3>
        </div>
        <div class="card-body">
            <table  id="enseignants" class="table table-bordered table-striped" >
                <thead>
                    <tr>
                        <th scope="col">Diplome</th>
                        <th scope="col">Type Diplome</th>
                        <th scope="col">Date Diplome</th>
                        <th scope="col">Taux</th>
                        <th scope="col">PDF</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($diplomes as $item)
                    <tr>
                        <td>{{$item->libelle}}</td>
                        <td>{{$item->theme}}</td>
                        <td>{{$item->date_diplome}}</td>
                        <td>{{$item->taux}}</td>
                        <td>{{$item->file}}</td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

