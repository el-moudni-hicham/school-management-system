@extends('adminlte::page')
@section('plugins.Datatables', true)
@extends('layouts.app2')

@section('style')

@endsection

@section('title')
    Matieres | Gestion Des Enseignants
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
                        <th scope="col">Numéro</th>
                        <th scope="col">Libelle</th>
                        <th scope="col">Semestre</th>
                        <th scope="col">Actions</th>
                </thead>
                <tbody>
                    @foreach ($matieres as $key => $matiere)
                        <tr>
                            <td>{{$key+=1}}</td>
                            <td>{{$matiere->libelle}}</td>
                            <td>{{$matiere->semestre}}</td>


                                <td class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('matieres.edit', $matiere->id) }}"
                                        class="btn btn-sm btn-warning mx-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form id="{{$matiere->id}}" action="{{route("matieres.destroy",$matiere->id)}}" method="post">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                    <button onclick="deleteAd({{$matiere->id}})"
                                        type="submit" class="btn btn-sm btn-danger">
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
    $(document).ready( function () {
        $('#enseignants').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'pdf', 'print', 'colvis'
            ]
        });
    });
</script>

</script>
@if(session()->has("success"))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: "{{session()->get('success')}}",
            showConfirmButton: false,
            timer: 3500
        });
    </script>
@endif
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
