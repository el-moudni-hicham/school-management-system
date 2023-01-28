@extends('adminlte::page')
@section('plugins.Datatables', true)
@extends('layouts.app2')

@section('style')

@endsection

@section('title')
    Home| Gestion Des Enseignants
@endsection

@section('content_header')
    <h1>La liste des diplomes</h1>
@stop

@section('content')
    <div class="card my-3">
        <div class="card-body">
            <table  id="diplomes" class="table table-bordered table-striped" >
                <thead>
                    <tr>
                        <th scope="col">Numéro d'ordre</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom </th>
                        <th scope="col">RIB </th>
                        <th scope="col">libelle</th>
                        <th scope="col">Type de diplome</th>
                        <th scope="col">Date de diplome</th>
                        <th scope="col">Montant</th>
                        <th scope="col">fichier</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($diplomes as $item)
                       <tr>
                            <td>{{$item->id}}</td>

                            <td>{{$item->Enseignant->nom}}</td>
                            <td>{{$item->Enseignant->prenom}}</td>
                            <td>{{$item->Enseignant->rib}}</td>
                            <td>{{$item->libelle}}</td>
                            <td>{{$item->theme}}</td>
                            <td>{{$item->date_diplome}}</td>
                            <td>{{$item->taux}}</td>
                            <td>
                              <a href="{{route("diplomes.show",$item->id)}}"
                                     class="btn btn-sm btn-danger">
                                   <i class="fas fa-file-pdf"></i>
                               </a>
                           </td>


                        </tr>
                     @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection

    @section('js')
<script>
    $(document).ready( function () {
        $('#diplomes').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'pdf', 'print', 'colvis'
            ]
        });
    });
</script>

@endsection
