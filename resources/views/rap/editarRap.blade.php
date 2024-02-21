@extends('adminlte::page')

@section('title', 'Ambientes')

@section('content_header')
    <h1>Resultado de aprendizaje</h1>
@stop

@section('content')
<div class="card row d-flex flex-column p-3" style="margin: 0 100px">
    <div class=" col-12">
        <div>
            <h2>Crear Resultado de aprendizaje</h2>
        </div>
    </div>

    <div class="card-body">
        @foreach($rap as $resultado)
        <form action="{{route('resultadoAprendizaje.update',$resultado->Codigo)}}" method="POST">
            @csrf
            @method('PUT')
                <div class="row g-3">

                    <div class="col-md-7">
                        <label for="programa">Programa:</label>
                        <select class="form-select" id="programa" onchange="cargarCompetencias(this.value)">
                            <option selected disabled value=""> Elige el programa </option>
                            @foreach ($programas as $programa)
                                <option value="{{ $programa->Codigo }}" @selected($programa->Codigo == $resultado->Codigo_competencias)>
                                    {{ $programa->prog_codigoPrograma }} - {{ $programa->prog_Denominacion }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-5">
                        <label for="competencia">Competencia listada:</label>
                        <select name="Codigo_competencias" id="competencia" class="form-select">
                            <option value="" selected disabled hidden>Elige la competencia</option>
                            @foreach($competencias as $competencia)
                            <option value="{{$competencia->Codigo}}" @selected($competencia->Codigo == $resultado->Codigo_competencias)>
                                {{ $competencia->comp_codigoCompetencia }} - {{$competencia->comp_Denominacion}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <hr>
                    <p class="text-decoration-underline fw-bolder fs-5">Resultados De aprendizaje</p>
                    <div class="col-md-12">
                        <label class="form-label " >Resultados:</label>
                        <textarea class="form-control" name="resul_Denominacion" rows="2" >{{ $resultado->resul_Denominacion }}</textarea>
                    </div>
                    <hr>
                    <p class="text-decoration-underline fw-bolder fs-5">Criterios de evaluación</p>
                     <div class="col-md-12">
                          <label for="cri_Denominacion" class="form-label">Criterios:</label>
                          <textarea class="form-control" name="cri_Denominacion" rows="2" >{{ $resultado->criteriosEvaluacion()->first()['cri_Denominacion'] }}</textarea>
                      </div>
                      <hr>
                      <p class="text-decoration-underline fw-bolder fs-5">Conceptos y Principios</p>
                      <div class="col-md-12">
                          <label for="con_Denominacion" class="form-label">Denominacion:</label>
                          <textarea class="form-control" name="con_Denominacion" rows="2">{{ $resultado->conceptoPrincipios()->first()['con_Denominacion'] }}</textarea>
                      </div>
                      <hr>
                      <p class="text-decoration-underline fw-bolder fs-5">Procesos</p>
                      <div class="">
                          <label class="form-label">Procesos:</label>
                          <textarea class="form-control" name="pro_Denominacion" rows="2">{{ $resultado->procesos()->first()['pro_Denominacion'] }}</textarea>
                      </div>
                      <hr>
                      <p class="text-decoration-underline fw-bolder fs-5">Perfil Instructor</p>
                      <div class="col-md-6">
                          <label class="form-label">Requisitos académicos:</label>
                          <textarea class="form-control" name="per_RequisitosAcademicos" rows="2">{{ $resultado->perfiltecnicoInstructor()->first()['per_RequisitosAcademicos'] }}</textarea>
                      </div>
                      <div class="col-md-6">
                          <label class="form-label">Experiencia:</label>
                          <textarea class="form-control" name="per_Experiencia" rows="2">{{ $resultado->perfiltecnicoInstructor()->first()['per_Experiencia'] }}</textarea>
                      </div>
                      <div class="col-md-6">
                          <label class="form-label">Competecnias Mínimas:</label>
                          <textarea class="form-control" name="per_CompetenciasMinimas" rows="2">{{ $resultado->perfiltecnicoInstructor()->first()['per_CompetenciasMinimas'] }}</textarea>
                      </div>
                      <div class="col-md-6">
                          <label class="form-label">Observaciones:</label>
                          <textarea class="form-control" name="per_Observacion" rows="2">{{ $resultado->perfiltecnicoInstructor()->first()['per_Observacion'] }}</textarea>
                      </div>

                      <hr>
                      <p class="text-decoration-underline fw-bolder fs-5">Material Requerido</p>
                      <div class="col-md-12">
                          <label class="form-label">Material:</label>
                          <textarea class="form-control" name="mat_Denominacion" rows="2">{{ $resultado->materialRequerido()->first()['mat_Denominacion'] }}</textarea>
                      </div>

                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                      <button type="submit" class="btn btn-secondary">Editar</button>
                  </div>
          </form>
      @endforeach
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

{{-- <script>
    function cargarCompetencias(programaId) {
        // solicitud AJAX para obtener las competencias asociadas al programa
        fetch(`/optener-competencias/${programaId}`)
            .then(response => response.json())
            .then(data => {
                // Limpiar el segundo select
                const competenciaSelect = document.getElementById('competencia');
                competenciaSelect.innerHTML = '';
                // console.log(data)
                // Agregar los select de la competencia
                data.forEach(competencia => {
                    const option = document.createElement('option');
                    option.value = competencia.Codigo;
                    option.text =  competencia.comp_codigoCompetencia + ' - ' + competencia.comp_Denominacion;
                    competenciaSelect.add(option);
                });
            })
            .catch(error => console.error('Error:', error));
    }
</script> --}}
@endsection
