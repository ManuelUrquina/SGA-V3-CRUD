@extends('adminlte::page')

@section('title', 'Competencias')

@section('content_header')
    <h1>Competencias</h1>
@stop

@section('content')

    @hasanyrole('instructor|aprendiz')
        <div class="alert alert-danger">Area solo para Administradores. 🧐</div>
    @endhasanyrole

    @role('admin')

        <a name="" id="" class="btn btn-secondary btn-sm m-2" href="{{ route('competencias.create') }}"
            role="button">Crear Competencia</a>
        <div class="card">
            <!-- DataTables -->
            <div class="card-body table-responsive p-2">
                <table id="datatables_competencias" class="display shadow-sm text-capitalize ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Código competencia</th>
                            <th>Nombre</th>
                            <th>versión NCL</th>
                            <th>Duración estimada</th>
                            <th>Créditos</th>
                            {{-- <th>Horas</th> --}}
                            <th>Horas FI</th>
                            <th>Id programa</th>

                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($competencias as $competencia)
                            <tr>
                                <td>{{ $competencia->Codigo }}</td>
                                <td>{{ $competencia->comp_codigoCompetencia }}</td>
                                <td>{{ $competencia->comp_Denominacion }}</td>
                                <td>{{ $competencia->comp_VersionNCl }}</td>
                                <td>{{ $competencia->comp_DuracionEstimada }}</td>
                                <td>{{ $competencia->comp_Creditos }}</td>
                                {{-- <td>{{ $competencia->comp_Horas }}</td> --}}
                                <td>{{ $competencia->comp_Horas_FI }}</td>
                                <td>
                                    {{ $competencia->Codigo_programa }}-
                                    {{-- -{{ $competencia->programarelacionado->prog_Denominacion }} --}}
                                    @if ($competencia->Codigo_programa && $competencia->programarelacionado)
                                        @php
                                            $programaRelacionado = $competencia->programarelacionado->where('Codigo', $competencia->Codigo_programa)->first();
                                        @endphp

                                        @if ($programaRelacionado)
                                            {{ $programaRelacionado->prog_Denominacion }}
                                        @endif
                                    @endif
                                    {{-- @if ($competencia->programarelacionado)
                                {{ $competencia->programarelacionado->prog_Denominacion }}
                            @endif --}}

                                </td>

                                <td class="d-flex">
                                    <a href="" class="btn btn-success btn-sm mr-2 p-1"
                                        style="width: 30px; height: 30px; border-radius: 50%" data-bs-toggle="modal"
                                        data-bs-target="#modalId-{{ $competencia->comp_codigoCompetencia }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('competencias.edit', $competencia->comp_codigoCompetencia) }}"
                                        class="btn btn-primary btn-sm mr-2"
                                        style="width: 30px; height: 30px; border-radius: 50%">
                                        <i class="fas fa-pen"></i>
                                    </a>

                                    <form action="{{ route('competencias.destroy', $competencia->comp_codigoCompetencia) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="
                                                event.preventDefault();
                                                swal({title: '¿Estás seguro de eliminar?',
                                                text: 'Una vez eliminado, no se podrá recuperar',
                                                icon: 'warning', buttons: true, dangerMode: true}).
                                                then((eliminar) => { if (eliminar){form.submit();}
                                                else {swal('Elemento no eliminado');}});
                                                "
                                            style="width: 30px; height: 30px; border-radius: 50%">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>

        <h3 class="fw-bold" style="margin-top: 40px">Resultados De Aprendizaje</h3>
        <a name="" id="" class="btn btn-secondary btn-sm m-2" href="{{ route('resultadoAprendizaje.create') }}"
            role="button">Crear Rap</a>
        <div class="card">
            <div class="card-body table-responsive p-2">
                <table id="datatables_raps" class="display shadow-sm text-capitalize ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Codigo resultado</th>
                            {{-- <th>Resultado</th> --}}
                            <th>competencia</th>
                            {{-- <th>criterios de evaluación</th> --}}
                            {{-- <th>--</th> --}}
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($raps as $rap)
                            <tr>
                                <td>{{ $rap->Codigo }}</td>
                                <td>{{ $rap->competencia->comp_codigoCompetencia . '-' . $rap->Codigo }}</td>
                                {{-- <td>{{ $rap->resul_Denominacion }}</td> --}}
                                <td>
                                    {{ $rap->competencia ? $rap->Competencia()->first()['comp_Denominacion'] : 'Sin competencia' }}
                                    {{-- @if ($rap->competencia)
                                {{ $rap->competencia->comp_Denominacion }}
                            @endif --}}
                                </td>
                                {{-- <td>{{ $rap->criteriosEvaluacion ? $rap->criteriosEvaluacion()->first()['cri_Denominacion'] : 'sin criterios' }}</td> --}}
                                {{-- <td>-</td> --}}
                                <td class="d-flex">
                                    <a href="{{ route('resultadoAprendizaje.edit', $rap->Codigo) }}"
                                        class="btn btn-primary btn-sm mr-2"
                                        style="width: 30px; height: 30px; border-radius: 50%">
                                        <i class="fas fa-pen"></i>
                                    </a>

                                    <form action="{{ route('resultadoAprendizaje.destroy', $rap) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="
                                                event.preventDefault();
                                                swal({title: '¿Estás seguro de eliminar?',
                                                text: 'Una vez eliminado, no se podrá recuperar',
                                                icon: 'warning', buttons: true, dangerMode: true}).
                                                then((eliminar) => { if (eliminar){form.submit();}
                                                else {swal('Elemento no eliminado');}});
                                                "
                                            style="width: 30px; height: 30px; border-radius: 50%">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>



        <!-- Modal -->
        @foreach ($competencias as $competencia)
            <div class="modal fade" id="modalId-{{ $competencia->Codigo }}" tabindex="-1" role="dialog"
                aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-capitalize" id="modalTitleId"><b class="fw-bold">{{ $competencia->comp_Denominacion }}</b></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-capitalize">
                                @foreach ($competencia->resultadoAprendizajes as $ra)
                                <div class="table-responsive">
                                    {{-- <table class="table ">
                                        <thead class="">
                                            <tr>
                                                <th scope="col" style="width: 6rem;"> CÓDIGO </th>
                                                <th scope="col">RESULTADOS DE APRENDIZAJE</th>
                                                <th scope="col">CRITERIOS DE EVALUACIÓN</th>
                                                <th scope="col">CONCEPTOS Y PRINCIPIOS</th>
                                                <th scope="col">PROCESOS</th>
                                                <th scope="col">PERFIL TÉCNICO DEL INSTRUCTOR</th>
                                                <th scope="col">MATERIAL REQUERIDO</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            <tr >
                                                <td class="text-start ">{{$competencia->comp_codigoCompetencia.'-'.$ra->Codigo}}</td>
                                                <td class="text-break"  >{{ $ra->resul_Denominacion }}</td>
                                                <td class="text-break">{{ $rap->criteriosEvaluacion()->first()['cri_Denominacion'] }}</td>
                                                <td class="text-break">{{ $rap->conceptoPrincipios()->first()['con_Denominacion'] }}</td>
                                                <td class="text-break">{{ $rap->procesos()->first()['pro_Denominacion'] }}</td>
                                                <td class="text-break">{{ $rap->perfiltecnicoInstructor()->first()['per_RequisitosAcademicos'] }}</td>
                                                <td class="text-break">{{ $rap->materialRequerido()->first()['mat_Denominacion'] }}</td>
                                            </tr>
                                        </tbody>
                                    </table> --}}

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 6rem;">Código</th>
                                                <th>Resultado De Aprendizaje</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $competencia->comp_codigoCompetencia.'-'.$ra->Codigo }}</td>
                                                <td>{{ $ra->resul_Denominacion }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <h4>CRITERIOS DE EVALUACIÓN</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 6rem;">Código</th>
                                                <th>Criterio</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ra->criteriosEvaluacion as $cri)
                                            <tr>
                                                <td>{{ $competencia->comp_codigoCompetencia.'-'.$cri->Codigo }}</td>
                                                <td>{{ $cri->cri_Denominacion }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <h4>CONOCIMIENTOS</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 6rem;">Código</th>
                                                <th>Conocimientos De Conceptos Y Principios</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ra->conceptoPrincipios as $con)
                                            <tr>
                                                <td>{{ $competencia->comp_codigoCompetencia.'-'.$con->Codigo }}</td>
                                                <td>{{ $con->con_Denominacion }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <h4>DE PROCESOS</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 6rem;">Código</th>
                                                <th>Procesos</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ra->procesos as $pro)
                                            <tr>
                                                <td>{{ $competencia->comp_codigoCompetencia.'-'.$pro->Codigo }}</td>
                                                <td>{{ $pro->pro_Denominacion }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <h4>PERFIL TÉCNICO DEL INSTRUCTOR</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 6rem;">Código</th>
                                                <th>Requisitos Academicos</th>
                                                <th>Experiencia</th>
                                                <th>Competencias Minimas</th>
                                                <th>Observación</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ra->perfiltecnicoInstructor as $per)
                                            <tr>
                                                <td>{{ $competencia->comp_codigoCompetencia.'-'.$per->Codigo }}</td>
                                                <td>{{ $per->per_RequisitosAcademicos }}</td>
                                                <td>{{ $per->per_Experiencia }}</td>
                                                <td>{{ $per->per_CompetenciasMinimas }}</td>
                                                <td>{{ $per->per_Observacion }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <h4>MATERIAL</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 6rem;">Código</th>
                                                <th>Material Requerido</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ra->materialRequerido as $mat)
                                            <tr>
                                                <td>{{ $competencia->comp_codigoCompetencia.'-'.$mat->Codigo }}</td>
                                                <td>{{ $mat->mat_Denominacion }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach





    @endrole
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    {{-- datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
@stop

@section('js')
    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- DataTables JS-->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script>
        const dataTableOpciones = {
            "order": [
                [0, 'asc']
            ],
        }

        $(document).ready(function() {
            $('#datatables_competencias').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#datatables_raps').DataTable();
        });
    </script>
@stop
