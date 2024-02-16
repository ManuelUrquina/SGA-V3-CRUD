
@extends('adminlte::page')

@section('title', 'Vigencias')

@section('content_header')
    <h1>Vigencias</h1>
@stop

@section('content')
<div class="card row d-flex flex-column p-3" style="margin: 0 100px">
    <div class=" col-12">
        <div>
            <h2>Editar Vigencia</h2>
        </div>
    </div>

    <div class="card-body">
        <form action="{{route('vigencias.update', $vigencia->Codigo)}}" method="POST" >
            @csrf
            @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" >Contrato:</label>
                        <input type="number" name="vig_Contrato" class="form-control" placeholder="Contrato" value="{{ $vigencia->vig_Contrato }}" required >
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" >Año:</label>
                        <input type="number" name="vig_anio" class="form-control" placeholder="Año" value="{{ $vigencia->vig_anio }}" required >
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" >Inicio:</label>
                        <input type="date" name="vig_Inicio" class="form-control" placeholder="Inicio" value="{{ $vigencia->vig_Inicio }}" required >
                    </div>


                    <div class="col-md-6">
                        <label>Fin:</label>
                        <input type="date" name="vig_Fin" class="form-control" placeholder="Fin" value="{{ $vigencia->vig_Fin }}" required >
                    </div>

                    <div class="col-md-6">
                        <label>Objeto:</label>
                        {{-- <input type="text" name="vig_Objetos" class="form-control" placeholder="Objeto" value="{{ $vigencia->vig_Objetos }}" required > --}}
                        <textarea name="vig_Objetos" class="form-control">{{ $vigencia->vig_Objetos }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" >Red de Conocimiento:</label>
                        <select class="form-control" name="Codigo_red">
                            @foreach ($redes as $re)
                                <option value="{{ $re -> Codigo }}"> ({{ $re -> Codigo }}) {{ $re -> red_Denominacion }}  </option>
                        </select>
                        @endforeach
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
