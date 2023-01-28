@extends('adminlte::page')

@extends('layouts.app2')

@section('style')

@endsection

@section('title')
    Home| Gestion Des Enseignants
@endsection

@section('content_header')
<h1>Page d'accueil</h1>
@stop




@section('content')
    <section class="content">
    
        <div class="container-fluid my-4">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="shadow-lg small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\Enseignant::count() }}</h3>
                            <p>Enseignants</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ url('admin/enseignants') }}" class="small-box-footer">
                            Voir <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="shadow-lg small-box bg-warning">
                        <div class="inner">
                            <h3>{{ \App\Models\Matiere::count() }}</h3>
                            <p>Matieres</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-book"></i>
                        </div>
                        <a href="{{ url('admin/matieres') }}" class="small-box-footer">
                            voir <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @stop
