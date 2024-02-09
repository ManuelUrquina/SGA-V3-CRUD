
@extends('adminlte::page')

@section('title', 'Fichas')

@section('content_header')
    <h1>Fichas</h1>
@stop

@section('content')
<div class="card row d-flex flex-column p-3" style="margin: 0 100px">
    <div class=" col-12">
        <div>
            <h2>Editar Ficha</h2>
        </div>
    </div>

    <div class="card-body">
        <form action="{{route('fichas.update', $ficha->Codigo)}}" method="POST" >
            @csrf
            @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" >Código:</label>
                        <input type="number" name="fich_Codigo" class="form-control" placeholder="Nombre" value="{{ $ficha->fich_Codigo }}" required >
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" >Inicio:</label>
                        <input type="date" name="fich_Inicio" class="form-control" placeholder="Nombre" value="{{ $ficha->fich_Inicio }}" required >
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" >Fin:</label>
                        <input type="date" name="fich_Fin" class="form-control" placeholder="Apellido" value="{{ $ficha->fich_Fin }}" required >
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" >Etapa:</label>
                        <input type="text" name="fich_Etapa" class="form-control" placeholder="Apellido" value="{{ $ficha->fich_Etapa }}" required >
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Programa:</label>
                        <select name="Codigo_programa" class="form-select" required>
                            <option selected value=""> Elige el programa </option>
                            @foreach ($programas as $programa)
                                <option value="{{ $programa->prog_codigoPrograma }}" @selected($programa->prog_codigoPrograma == $ficha->Codigo_programa)>
                                    {{ $programa->prog_Denominacion }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" >Modalidad:</label>
                        <select name="Codigo_modalidad" class="form-select" required>
                            <option selected value=""> Elige la modalidad </option>
                            @foreach ($modalidad as $mod)
                                <option value="{{ $mod->id }}" @selected($mod->id == $ficha->Codigo_modalidad)>
                                    {{ $mod->mod_Denominacion }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" >Centro:</label>
                        <select name="Codigo_centro" class="form-select" aria-label="Default select example">
                            <option selected>Selecciona el centro</option>
                            @foreach ($centros as $centro)
                                <option value="{{ $centro->Codigo }}" @selected($centro->Codigo_centro == $ficha->Codigo_centro)>
                                    {{ $centro->cent_Denominacion }}
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
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
@stop
