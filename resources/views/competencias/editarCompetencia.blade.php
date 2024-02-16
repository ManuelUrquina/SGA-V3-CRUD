@extends('adminlte::page')

@section('title', 'Crear Usuario')

@section('content_header')
    <h1>Competencias</h1>
@stop

@section('content')
    <div class="card row d-flex flex-column p-3" style="margin: 0 100px">
        <div class=" col-12">
            <div>
                <h2>Editar Competencia</h2>
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
            <form action="{{route('competencias.update',$competencia->comp_codigoCompetencia)}}" method="POST" >
                @csrf
                @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" >Código Competencia:</label>
                            <input type="number" name="comp_codigoCompetencia" class="form-control" value="{{$competencia->comp_codigoCompetencia}}" required >
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" >Nombre:</label>
                            <input type="text" name="comp_Denominacion" class="form-control" value="{{$competencia->comp_Denominacion}}" required >
                        </div>
                        <div class="col-md-6">
                            <label>versión NCL:</label>
                            <input type="text" name="comp_VersionNCl" class="form-control" value="{{$competencia->comp_VersionNCl}}" required >
                        </div>
                        <div class="col-md-6">
                            <label for="role_id">Programa:</label>
                            <select name="Codigo_programa" class="form-select" required>
                                @foreach ($programas as $programa)
                                    <option value="{{ $programa->prog_codigoPrograma }}" @selected($programa->prog_codigoPrograma == $competencia->Codigo_programa) >
                                        {{$programa->prog_Denominacion}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Duración estimada (horas):</label>
                            <input type="number" name="comp_DuracionEstimada" class="form-control" value="{{$competencia->comp_DuracionEstimada}}" required >
                        </div>
                        <div class="col-md-6">
                            <label>Créditos:</label>
                            <input type="number" name="comp_Creditos" class="form-control" value="{{$competencia->comp_Creditos}}" required >
                        </div>
                        {{-- <div class="col-md-6">
                            <label>Horas:</label>
                            <input type="number" name="comp_Horas" class="form-control" value="{{$competencia->comp_Horas}}" required >
                        </div>                   --}}
                        <div class="col-md-6">
                            <label>Horas FI:</label>
                            <input type="number" name="comp_Horas_FI" class="form-control" value="{{$competencia->comp_Horas_FI}}" required >
                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                        <button type="submit" class="btn btn-secondary">Editar Competencia</button>
                    </div>
            </form>
        </div>


    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@stop
