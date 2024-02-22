@extends('adminlte::page')

@section('title', 'Fichas')

@section('content_header')
    <h1>Fichas</h1>
@stop

@section('content')

@hasanyrole('instructor|aprendiz')
    <div class="alert alert-danger">Area solo para Administradores. 🧐</div>
@endhasanyrole

@role('admin')

<a class="btn btn-secondary btn-sm m-2" href="{{ route('fichas.create') }}" role="button" >Crear Ficha</a>
<div class="card">
    <!-- DataTables -->
    <div class="card-body table-responsive p-2">
        <table id="datatables_instructores" class="display shadow-sm text-capitalize " >
            <thead>
            <tr>

                <th>Código</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Etapa</th>
                <th>Programa</th>
                <th>modalidad de formación</th>
                <th>Centro</th>
                <th>tiempo de ejecución</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($fichas as $ficha)
                @php
                    $modalidadFicha = $modalidades->where('Codigo_modalidad', $ficha->Codigo_modalidad)->first();

                    $centros = $centro->where('Codigo_centro', $ficha->Codigo_centro)->first();

                @endphp
                <tr>
                    <td>{{ $ficha->Codigo }}</td>
                    <td>{{ $ficha->fich_Inicio }}</td>
                    <td>{{ $ficha->fich_Fin }}</td>
                    <td>{{ $ficha->fich_Etapa }}</td>
                    <td>{{ $ficha->Codigo_programa }}</td>
                    <td>{{ $modalidadFicha->mod_Denominacion }}</td>

                    <td>{{ $centros->cent_Denominacion }}</td>

                    <td>{{ $ficha->Codigo_centro }}</td>

                    <td>
                        <div class="d-flex">
                            <progress class="my-auto" id="progreso" value="{{ $ficha->diasPorcentaje }}" max="100"></progress>
                            <label class="pl-2 my-auto" for="progreso">{{ $ficha->diasPorcentaje }}%</label>
                        </div>
                        @if ($ficha->diasRestantes === 0)
                            <small>Terminado</small>
                        @else
                            <small>{{ $ficha->diasRestantes . " de" }} {{ $ficha->diasTotal . " Días" }}</small>
                        @endif
                    </td>
                    <td class="d-flex">
                        <a href="{{ route('fichas.edit', $ficha->Codigo) }}" class="btn btn-primary btn-sm mr-2"
                           style="width: 30px; height: 30px; border-radius: 50%">
                            <i class="fas fa-pen"></i>
                        </a>
                        <form action="{{ route('fichas.destroy', $ficha->Codigo) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="event.preventDefault();
                                 swal({
                                    title: '¿Estás seguro de eliminar?',
                                    text: 'Una vez eliminado, no se podrá recuperar',
                                    icon: 'warning',
                                    buttons: true,
                                    dangerMode: true
                                 }).then((eliminar) => {
                                    if (eliminar) {
                                        form.submit();
                                    } else {
                                        swal('Elemento no eliminado');
                                    }
                                 });"
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
@endrole
@stop

@section('css')
{{-- datatables --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
@stop

@section('js')
     {{-- jQuery --}}
     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
     <!-- DataTables JS-->
     <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

     <!-- SweetAlert2 -->
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script>
         const dataTableOpciones = {
             "order": [[ 0, 'asc' ]],
         }

         $(document).ready(function () {
             $('#datatables_instructores').DataTable();
         });
    </script>
@stop
