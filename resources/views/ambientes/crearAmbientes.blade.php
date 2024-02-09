@extends('adminlte::page')

@section('title', 'Ambientes')

@section('content_header')
    <h1>Ambientes</h1> 
@stop

@section('content')
    <div class="card row d-flex flex-column p-3" style="margin: 0 100px">
        <div class=" col-12">
            <div>
                <h2>Crear ambiente</h2>
            </div>        
        </div>

        {{-- mensaje de error de campos requeridos --}}
        {{-- @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <strong>Aviso importante!</strong> Algo anda mal..<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <div class="card-body">
            <form action="{{route('ambientes.store')}}" method="POST" >
                @csrf            
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" >Nombre:</label>
                            <input type="text" name="amb_Denominacion" class="form-control" placeholder="Nombre">
                            @error('amb_Denominacion')
                                <p class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>                    
                        <div class="col-md-6">
                            <label class="form-label" >Cupo:</label>
                            <input type="number" name="amb_Cupo" class="form-control" placeholder="Cupo" min="0" >
                            @error('amb_Cupo')
                                <p class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Tipo:</label>
                            <select id="tipo" name='Codigo_tipo' class="form-control">
                                <option selected value=""> Elige un Tipo </option>
                                @foreach ($tipoAmbiente as $tipo)
                                    <option value="{{ $tipo->Codigo }}">{{ $tipo->tip_Denominacion }}</option>
                                @endforeach
                                {{-- <option value="ambiente polivalente">Ambiente polivalente</option>
                                <option value="ambiente pluritecnológico">Ambiente pluritecnológico</option>
                                <option value="auditorio">Auditorio</option>
                                <option value="ambiente virtual">Ambiente virtual</option> 
                                <option value="campo deportivo">Campo deportivo</option> --}}
                            </select>
                            @error('Codigo_tipo')
                                <p class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror                                  
                        </div>   
                        
                        <div class="col-md-6">                        
                            <label>Estado:</label>
                            <select name="Codigo_estado" class="form-select">
                                <option selected value=""> Elige el Estado </option>
                                @foreach($estadoAmbiente as $estado )
                                    <option value="{{ $estado->Codigo }}">{{ $estado->est_Denominacion }}</option>
                                @endforeach
                                {{-- <option value="Activo"> Habilitado </option>
                                <option value="Activo"> No Habilitado </option> --}}
                            </select>
                            @error('Codigo_estado')
                                <p class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror 
                        </div>                     
                                          
                    </div>               
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                        <button type="submit" class="btn btn-secondary">Crear</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        //funcion para multiplicar las horas x 48 y llenar el input creditos
        let horas = document.getElementById("horas");
        let creditos = document.getElementById("creditos");

        horas.addEventListener("input", function(){
            let valor = Number(horas.value);
            resultado = valor / 48;    
            creditos.value = resultado;
        });
    </script>
@endsection