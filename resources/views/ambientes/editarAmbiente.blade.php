@extends('adminlte::page')

@section('title', 'Ambientes')

@section('content_header')
    <h1>Ambientes</h1> 
@stop

@section('content')
    <div class="card row d-flex flex-column p-3" style="margin: 0 100px">
        <div class=" col-12">
            <div>
                <h2>Editar ambiente</h2>
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
            <form action="{{route('ambientes.update', $ambiente->Codigo)}}" method="POST" >
                @csrf 
                @method('PUT')               
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" >Nombre:</label>
                            <input type="text" name="amb_Denominacion" class="form-control" value="{{ $ambiente->amb_Denominacion }}"  >
                        </div>                    
                        <div class="col-md-6">
                            <label class="form-label" >Cupo:</label>
                            <input type="number" name="amb_Cupo" class="form-control"  value="{{ $ambiente->amb_Cupo }}"  >
                        </div>
                        <div class="col-md-6">
                            <label>Tipo:</label>
                            <select id="tipo" name='Codigo_tipo' class="form-control" >
                                <option selected value=""> Elige un Tipo </option>
                                @foreach ($tipoAmbiente as $tipo)
                                    <option value="{{ $tipo->Codigo }}" @selected($tipo->Codigo == $ambiente->Codigo_tipo)>
                                        {{ $tipo->tip_Denominacion }}
                                    </option>
                                @endforeach                                
                            </select>                                  
                        </div>   
                        
                        <div class="col-md-6">                        
                            <label>Estado:</label>
                            <select name="Codigo_estado" class="form-select" >
                                <option selected value=""> Elige el Estado </option>
                                @foreach($estadoAmbiente as $estado )
                                    <option value="{{ $estado->Codigo }}" @selected($estado->Codigo == $ambiente->Codigo_estado)>
                                        {{ $estado->est_Denominacion }}
                                    </option>
                                @endforeach                                
                            </select> 
                        </div>                     
                                          
                    </div>               
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                        <button type="submit" class="btn btn-secondary">Editar</button>
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