
@extends('adminlte::page')

@section('title', 'Centros')

@section('content_header')
    <h1>Centros</h1>
@stop

@section('content')
    <div class="card row d-flex flex-column p-3" style="margin: 0 100px">
        <div class=" col-12">
            <div>
                <h2>Crear Centro</h2>
            </div>
        </div>

        <div class="card-body">
            <form action="{{route('centros.store')}}" method="POST" >

                @csrf
                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label" >Nombre:</label>
                        <input type="text" name="cent_Denominacion" class="form-control" placeholder="Nombre" value="{{$test}}">
                        @error('cent_Denominacion')
                        <p class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" >Regional:</label>
                        <select class="form-control" name="Codigo_regional">
                            @foreach ($regionales as $regional)
                                <option value="{{ $regional->Codigo }}"> {{ $regional->reg_Denominacion }} ({{ $regional->Codigo }}) </option>
                            @endforeach
                        </select>


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
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
@stop
