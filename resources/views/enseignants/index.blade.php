@extends('adminlte::page')
@section('plugins.Datatables', true)
@extends('layouts.app2')

@section('style')

@endsection

@section('title')
    Home | Gestion Des Enseignants
@endsection

@section('content_header')
    <h1>La liste des enseignants </h1>
@stop

@section('content')
    <div class="card my-3 shadow-lg">
        <div class="card-header">
            <h3 class="text-center text-uppercase">
                {{\App\Models\Enseignant::count()}} Enseignants
            </h3>
        </div>
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
                                <a href="{{ route('enseignants.show', $enseignant->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('enseignants.edit', $enseignant->id) }}"
                                    class="btn btn-sm btn-warning mx-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                {{-- <form id="{{$enseignant->cin}}" action="{{route("enseignants.destroy",$enseignant->cin)}}" method="post">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                    <button onclick="deleteAd({{$enseignant->cin}})"
                                        type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button> --}}

                                <form id="{{$enseignant->id}}" action="{{ route('soft.delete', $enseignant->id) }}" method="post">
                                    @csrf
                                    @method("GET")
                                </form>
                                <button onclick="deleteAd({{$enseignant->id}})" type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <a href="{{ route('enseignants.create.diplome', $enseignant->id) }}"
                                    class="btn btn-sm btn-secondary mx-2">
                                    Ajoute diplome
                                </a>
                                {{-- <a href="https://mail.google.com/mail/u/0/#inbox?compose=new"
                                target="_blank" rel="noopener noreferrer"
                                    class="btn btn-sm btn-success mx-2">
                                    Email
                                </a> --}}
                                {{-- <a href="{{route("enseignant.matieres",$enseignant->id)}}"
                                        class="btn btn-sm btn-success mx-2">
                                        matieres
                                    </a> --}}
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

    @if (session()->has('success'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: "{{ session()->get('success') }}",
                showConfirmButton: false,
                timer: 2500
            })
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
