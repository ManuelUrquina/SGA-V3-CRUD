@extends('adminlte::page')

@section('title', 'Crear Usuario')

@section('content_header')
    <h1>Competencias</h1>
@stop

@section('content')
    <div class="card row d-flex flex-column p-3" style="margin: 0 100px">
        <div class=" col-12">
            <div>
                <h2>Crear Competencia</h2>
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
            <form action="{{route('competencias.store')}}" method="POST" >
                @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" >Código Competencia:</label>
                            <input type="number" name="comp_codigoCompetencia" class="form-control" placeholder="Código" required >
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" >Nombre:</label>
                            <input type="text" name="comp_Denominacion" class="form-control" placeholder="Nombre" required >
                            {{-- <textarea name="comp_Denominacion" class="form-control" placeholder="Denominación"></textarea> --}}
                        </div>
                        <div class="col-md-6">
                            <label>versión NCL:</label>
                            <input type="number" name="comp_VersionNCl" class="form-control" placeholder="versión NCL" required >
                        </div>
                        {{-- <div class="col-md-6">
                            <label>ID programa:</label>
                            <input type="text" name="Codigo_programa" class="form-control" placeholder="ID programa" required >
                        </div> --}}
                        {{-- ------ --}}
                        <div class="col-md-6">
                            <label for="role_id">Programa:</label>
                            <select name="Codigo_programa" class="form-select" required>
                                <option selected value=""> Elige el programa </option>
                                @foreach ($programas as $programa)
                                    <option value="{{ $programa->Codigo }}" >
                                        {{ $programa->prog_Denominacion }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- --------- --}}
                        <div class="col-md-6">
                            <label>Duración estimada (horas):</label>
                            <input type="number" id="horas" name="comp_DuracionEstimada" class="form-control" placeholder="Duración" required >
                        </div>
                        {{-- <div class="col-md-6">
                            <label>Horas:</label>
                            <input type="number"  name="comp_Horas" class="form-control" placeholder="" required >
                        </div>                   --}}
                        <div class="col-md-6">
                            <label>Créditos:</label>
                            <input type="number" id="creditos" name="comp_Creditos" class="form-control" placeholder="Créditos" required >
                        </div>

                        <div class="col-md-6">
                            <label>Horas FI:</label>
                            <input type="number" name="comp_Horas_FI" class="form-control" placeholder="Horas FI" required >
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
