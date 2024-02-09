@extends('adminlte::page')

@section('title', 'Crear Usuario')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    <div class="card row d-flex flex-column p-3" style="margin: 0 100px">
        <div class=" col-12">
            <div>
                <h2>Crear Usuario</h2>
            </div>        
        </div>

        {{-- mensaje de error de campos requeridos --}}
        @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <strong>Aviso importante!</strong> Algo anda mal..<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-body">
            <form action="{{route('usuarios.store')}}" method="POST" >
                @csrf            
                    <div class="row g-3">                    
                        <div class="col-md-6">
                            <label class="form-label" >Nombre:</label>
                            <input type="text" name="name" class="form-control" placeholder="Nombre" required >
                        </div>
                        <div class="col-md-6">
                            <label>Correo:</label>
                            <input type="text" name="email" class="form-control" placeholder="Correo" required >
                        </div>
    
                        <div class="col-md-4">                        
                            <label for="role_id">Rol:</label>
                            <select name="role_id" class="form-select" required>
                                <option selected value=""> Elige el Rol </option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" >
                                        {{$role->name}}
                                    </option>
                                @endforeach
                            </select> 
                        </div>                        
    
                        <div class="col-md-4">
                            <label>Fecha de expiración:</label>
                            <input type="datetime-local" name="fechaVencida" class="form-control" placeholder="Fecha" required >
                        </div>                  
                        <div class="col-md-4">
                            <label>Contraseña:</label>
                            <input type="password" name="password" class="form-control" placeholder="contraseña" required >
                        </div>                  
                                          
                    </div>               
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                        <button type="submit" class="btn btn-secondary">Crear Usuario</button>
                    </div>            
            </form>
        </div>


    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@stop

@section('js')
    
@endsection