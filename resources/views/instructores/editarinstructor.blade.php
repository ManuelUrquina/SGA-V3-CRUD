@extends('adminlte::page')

@section('title', 'Crear Usuario')

@section('content_header')
    <h1>Instructores</h1>
@stop

@section('content')
<div class="card row d-flex flex-column p-3" style="margin: 0 100px">
    <div class=" col-12">
        <div>
            <h2>Crear Instructor</h2>
        </div>        
    </div>
    
    <div class="card-body">
        <form action="{{route('instructores.update', $instructor->Codigo)}}" method="POST" >
            @csrf
            @method('PUT')             
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" >Nombre:</label>
                        <input type="text" name="inst_Nombres" class="form-control" placeholder="Nombre" value="{{ $instructor->inst_Nombres }}" required >
                    </div>                    
                    <div class="col-md-6">
                        <label class="form-label" >Apellido:</label>
                        <input type="text" name="inst_Apellido" class="form-control" placeholder="Apellido" value="{{ $instructor->inst_Apellido }}" required >
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" >Tipo de documento:</label>
                        <input type="text" name="inst_TipoID" class="form-control" placeholder="Tipo" value="{{ $instructor->inst_TipoID }}" required >
                    </div>
                    <div class="col-md-6">
                        <label>Cédula:</label>
                        <input type="number" name="inst_Identificacion" class="form-control" placeholder="Identificacion" value="{{ $instructor->inst_Identificacion }}" required >
                    </div>  

                    <div class="col-md-6">
                        <label>Dirección:</label>
                        <input type="text" id="" name="inst_Direccion" class="form-control" placeholder="Dirección" value="{{ $instructor->inst_Direccion }}" required >
                    </div>
                        
                    <div class="col-md-6">
                        <label>Correo:</label>
                        <input type="email" id="" name="inst_Correo" class="form-control" placeholder="Correo" value="{{ $instructor->inst_Correo }}" required >
                    </div>                                                         
                                      
                    <div class="col-md-6">
                        <label>Teléfono:</label>
                        <input type="number" name="inst_Telefono" class="form-control" placeholder="Tel" value="{{ $instructor->inst_Telefono }}" required >
                    </div>                  
                    <div class="col-md-6">
                        <label>Vigencia:</label>
                        <select name="Codigo_vigencia" class="form-select" required>
                            <option selected value=""> Elige la vigencia </option>
                            @foreach ($vigencias as $vigencia)
                                <option value="{{ $vigencia->Codigo }}" @selected( $vigencia->Codigo == $instructor->Codigo_vigencia ) >
                                    {{ $vigencia->vig_Fin }}
                                </option>
                            @endforeach
                        </select> 
                    </div>                  
                                      
                </div>               
                
                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                    <button type="submit" class="btn btn-secondary">Editar Instructor</button>
                </div>            
        </form>
    </div>
</div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@stop