@extends('adminlte::page')

@section('title', 'Crear Programas')

@section('content_header')
    <h1>Programas</h1>    
@stop

@section('content')
    <div class="card row d-flex flex-column p-3" style="margin: 0 100px">
        <div class="col-12">
            <div>
                <h2>Crear Programa</h2>
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
    
        <form action="{{route('programas.store')}}" method="POST" >
            @csrf  
                <div class="row g-3">                    
                    <div class="col-md-6">
                        <label class="form-label" >Código Programa:</label>
                        <input type="number" name="prog_codigoPrograma" class="form-control" placeholder="Código">
                        @error('prog_codigoPrograma')
                            <p class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" >Programa:</label>
                        <input type="text" name="prog_Denominacion" class="form-control" placeholder="Programa">
                        @error('prog_Denominacion')
                            <p class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label>Versión:</label>
                        <input type="number" name="prog_Version" class="form-control" placeholder="Versión" min="0">
                        @error('prog_Version')
                            <p class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="col-md-4">                        
                        <label class="form-label">Estado:</label>
                        <select name="prog_Estado" class="form-select" id="" >
                            <option selected value=""> Elige el estado </option>
                            <option class="" value="Activo">Activo</option>
                            <option class="" value="Inactivo">Inactivo</option>
                        </select>
                        @error('prog_Estado')
                            <p class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="col-md-4">                        
                        <label class="form-label">Nivel De Formación:</label>
                        <select name="prog_NivelFormacion" class="form-select" id="nivelFormacion">
                            <option selected value=""> Elige el nivel </option>
                            <option value="Técnico">Técnico</option>
                            <option value="Tecnólogo">Tecnólogo</option>
                        </select>
                        @error('prog_NivelFormacion')
                            <p class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label >Horas:</label>
                        <input type="number" id="horas" name="prog_HorasEstimadas" class="form-control" placeholder="Horas" min="1">
                        @error('prog_HorasEstimadas')
                            <p class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label>Créditos:</label>
                        <input type="number" id="creditos" name="prog_Creditos" class="form-control" placeholder="Créditos" min="1">
                        @error('prog_Creditos')
                            <p class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label>Meses:</label>
                        <input type="number" name="prog_DuracionMeses" class="form-control" placeholder="Meses" min="1">
                        @error('prog_DuracionMeses')
                            <p class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>                   
                    
                    <div class="col-md-4">
                        <label>Etapa Lectiva (Horas):</label>
                        <input type="number" id="lectiva" name="prog_etapaLectiva" class="form-control" placeholder="Lectiva" min="1">
                        @error('prog_etapaLectiva')
                            <p class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label>Etapa Productiva (Horas):</label>
                        <input type="number" id="productiva" name="prog_etapaProductiva" class="form-control" placeholder="Productiva" min="1">
                        @error('prog_etapaProductiva')
                            <p class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label>Total Horas:</label>
                        <input type="number" name="prog_totalHoras" class="form-control" placeholder="Horas" min="1">
                        @error('prog_totalHoras')
                            <p class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label>Justificación:</label>
                        <textarea class="form-control" name="prog_justificacion" placeholder="Justificación"></textarea>
                        @error('prog_justificacion')
                            <p class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label>Metodológia:</label>
                        <textarea class="form-control" name="prog_metodologia" placeholder="Metodológia"></textarea>
                        @error('prog_metodologia')
                            <p class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label>Descripción:</label>
                        <textarea class="form-control" style="height:100px" name="prog_Descripcion" placeholder="Descripción..." ></textarea>
                        @error('prog_Descripcion')
                            <p class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                </div>               
                
                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                    <button type="submit" class="btn btn-secondary">Crear programa</button>
                </div>            
        </form>

        {{-- <p>{{ $input }}</p> --}}
    </div>
@endsection

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        //funcion para multiplicar las horas x 48 y llenar el input creditos
        let horas = document.getElementById("horas");
        let creditos = document.getElementById("creditos");
        let productiva = document.getElementById("productiva");
        let lectiva = document.getElementById("lectiva");
        let nivel = document.getElementById("nivelFormacion");

        horas.addEventListener("input", function(){
            let valor = Number(horas.value);
            resultado = valor / 48;    
            creditos.value = resultado;
            console.log(nivel.value)

            if(nivel.value == 'Técnico'){
                resul = Math.round( (0.3914)*resultado );
                productiva.value = resul * 48;

                resul2 = Math.round( (0.60855)*resultado );
                lectiva.value = resul2 * 48;

            }else{
                resul = Math.round( (0.22)*resultado );
                productiva.value = resul * 48;

                resul2 = Math.round( (0.78)*resultado );
                lectiva.value = resul2 * 48;
            }

        });


    </script>
@endsection