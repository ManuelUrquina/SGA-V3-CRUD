
@extends('adminlte::page')

@section('title', 'Dashboard')

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
        <form action="{{route('instructores.store')}}" method="POST" >
            @csrf            
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" >Nombre:</label>
                        <input type="text" name="inst_Nombres" class="form-control" placeholder="Nombre" required >
                    </div>                    
                    <div class="col-md-6">
                        <label class="form-label" >Apellido:</label>
                        <input type="text" name="inst_Apellido" class="form-control" placeholder="Apellido" required >
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" >Tipo de documento:</label> 
                        {{-- <input type="text" name="inst_TipoID" class="form-control" placeholder="Tipo" required > --}}
                        <select name="inst_TipoID" class="form-select" aria-label="Default select example">
                            <option selected>Selecciona el tipo</option>
                            <option value="cédula ciudadanía">cédula ciudadanía</option>
                            <option value="cédula Extranjera">cédula Extranjera</option>
                            <option value="pasaporte">pasaporte</option>
                            <option value="registro civil">registro civil</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label>Número Documento:</label>
                        <input type="number" name="inst_Identificacion" class="form-control" placeholder="Identificacion" required >
                    </div>  

                    <div class="col-md-6">
                        <label>Dirección:</label>
                        <input type="text" id="" name="inst_Direccion" class="form-control" placeholder="Dirección" required >
                    </div>
                        
                    <div class="col-md-6">
                        <label>Correo:</label>
                        <input type="email" id="" name="inst_Correo" class="form-control" placeholder="Correo" required >
                    </div>                                                         
                                      
                    <div class="col-md-6">
                        <label>Teléfono:</label>
                        <input type="number" name="inst_Telefono" class="form-control" placeholder="Tel" required >
                    </div>                  
                    <div class="col-md-6">
                        <label>Vigencia:</label>
                        {{-- <input type="number" name="Codigo_vigencia" class="form-control" placeholder="Vigencia"  > --}}
                        <select name="Codigo_vigencia" class="form-select" required>
                            <option selected value=""> Elige la vigencia </option>
                            @foreach ($vigencias as $vigencia)
                                <option value="{{ $vigencia->Codigo }}">
                                    {{ $vigencia->vig_Fin }}
                                </option>
                            @endforeach
                        </select> 
                    </div>                  
                                      
                </div>               
                
                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                    <button type="submit" class="btn btn-secondary">Crear Instructor</button>
                </div>            
        </form>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
@stop