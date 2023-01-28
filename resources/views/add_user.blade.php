
    @extends('adminlte::page')

    @extends('layouts.app2')

    @section('style')

    @endsection

    @section('title')
        Ajouter | Gestion Des Enseignants
    @endsection

    @section('content_header')
        <h1>Ajouter un admin</h1>
    @stop

    @section('content')
        <div class="card my-3">
            <div class="card-body">
                <form action="{{ route('homes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nom">Name</label>
                        @if($errors->has('name'))
                        <p style="color: red">{{ $errors->first('name') }}</p>
                        @endif
                        <input type="text" class="form-control" name="name" id="nom" placeholder="Saisir le nom" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        @if($errors->has('email'))
                        <p style="color: red">{{ $errors->first('email') }}</p>
                        @endif
                        <input type="email" class="form-control" name="email" id="email" placeholder="Saisir l'email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        @if($errors->has('password'))
                        <p style="color: red">{{ $errors->first('password') }}</p>
                        @endif
                        <input type="password" class="form-control" name="password" id="password" placeholder="Saisir le password">
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
    @endsection
