@extends('adminlte::page')
@section('plugins.Datatables', true)
@extends('layouts.app2')

@section('style')

@endsection

@section('title')
    Trash | Gestion Des Enseignants
@endsection

@section('content_header')
    <h1>La liste des enseignants supprimer </h1>
@stop

@section('content')
    <div class="card my-3">
        <div class="card-body">
            <table id="enseignants" class="table table-responsive table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Numéro d'ordre</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">CIN</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($enseignants as $key => $enseignant)
                        <tr>
                            <td>{{ $key += 1 }}</td>
                            <td><img class="rounded-circle" src="/storage/enseignant/{{ $enseignant->photo }}" width="50"
                                    height="50" onerror="this.style.display='none'"/></td>
                            <td>{{ $enseignant->nom }}</td>
                            <td>{{ $enseignant->prenom }}</td>
                            <td>{{ $enseignant->cin }}</td>
                            <td>{{ $enseignant->telephone }}</td>
                            <td>{{ $enseignant->email }}</td>


                            <td class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('enseignant.back.from.trash', $enseignant->id) }}"
                                    class="btn btn-sm btn-success mx-2">
                                    Retour
                                </a>
                                {{-- <a href="{{ route('enseignant.delete.from.database', $enseignant->id) }}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a> --}}

                                <form id="{{$enseignant->id}}" action="{{ route('enseignant.delete.from.database', $enseignant->id) }}" method="post">
                                    @csrf
                                    @method("GET")
                                </form>
                                <button onclick="deleteAd({{$enseignant->id}})" type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>

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
        $(document).ready(function() {
            $('#enseignants').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy','pdf', 'print', 'colvis'
                ]
            });
        });
    </script>
    <script>
        function deleteAd(id){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger mr-2'
                },
                buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                    title: 'vous êtes sûre ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Oui, supprimer !',
                    cancelButtonText: 'Non, annuler !',
                    reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(id).submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'La suppression a été annulée  ',
                    )
                }
                })
        }
    </script>
@endsection
