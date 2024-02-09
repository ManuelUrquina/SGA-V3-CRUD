@extends('adminlte::page')

@section('title', 'Redes')

@section('content_header')
    <h1>Redes de Conocimiento</h1>
@stop

@section('content')

    @hasanyrole('instructor|aprendiz')
    <div class="alert alert-danger">Area solo para Administradores. 🧐</div>
    @endhasanyrole

    @role('admin')
    <a class="btn btn-secondary btn-sm m-2" href="{{ route('redes.create') }}" role="button">Crear Redes</a>
    <div class="card">
        <!-- DataTables -->
        <div class="card-body table-responsive p-2">
            <table id="datatables_instructores" class="display shadow-sm text-capitalize " >
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>

                </tr>
                </thead>
                <tbody>
                @foreach ($redes as $red)
                    <tr>
                        <td>{{ $instructor->Codigo }}</td>
                        <td>{{ $instructor->red_Denominacion }}</td>>
                        <td>
                            {{-- @foreach ($instructor->eventos as $evento)
                                {{ $evento->title }}-
                            @endforeach --}}

                        </td>
                        <td class="d-flex">
                            <a href="{{ route('redes.edit', $instructor->Codigo) }}"
                               class="btn btn-primary btn-sm mr-2"
                               onclick=""
                               style="width: 30px; height: 30px; border-radius: 50%"
                            >
                                <i class="fas fa-pen"></i>
                            </a>

                            <form action="{{ route('redes.destroy', $instructor->Codigo) }}" method="POST" class="d-inline" >
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="
                                                 event.preventDefault();
                                                 swal({title: '¿Estás seguro de eliminar?',
                                                 text: 'Una vez eliminado, no se podrá recuperar',
                                                 icon: 'warning', buttons: true, dangerMode: true}).
                                                 then((eliminar) => { if (eliminar){form.submit();}
                                                 else {swal('Elemento no eliminado');}});
                                                 "
                                        style="width: 30px; height: 30px; border-radius: 50%"
                                >
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
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
            {{-- datatables --}}
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />

            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        @stop

        @section('js')
            {{-- jQuery --}}
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

            <!-- DataTables JS-->
            <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>


            <!-- SweetAlert2 -->
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

            <script>
                const dataTableOpciones = {
                    dom: 'Bfrtip',
                    buttons: [
                        'excel', 'csvHtml5', 'pdf',
                    ],
                }

                $(document).ready(function () {
                    $('#datatables_instructores').DataTable(dataTableOpciones);
                });
            </script>
@stop
