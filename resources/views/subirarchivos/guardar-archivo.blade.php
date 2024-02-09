@extends('adminlte::page')

@section('title', 'Archivos')

@section('content_header')
    <h1>Archivos</h1> 
@stop

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
@role('aprendiz')
    <div class="alert alert-danger">Area solo para Instructores. 🧐</div>
@endrole

@role('instructor') 
<div class="card" style="width: 30rem;">
    <div class="card-body">
        <form action="{{ route('guardar_archivo') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="">Nota</span>
                <input type="text" name="arc_descripcion" id="arc_descripcion" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                
            </div>
            
            <div class="input-group">
              <input type="file" class="form-control" name="archivo" id="archivo" onchange="updateFileName()" aria-label="Upload">
              <button type="submit" class="btn btn-outline-secondary">Subir</button>
            </div>
            <p id="selectedFileName"></p>
            <div id="fileHelpId" class="form-text">Solo se admiten archivos .pdf .png .docx .xlsx .png</div>

        </form>
    </div>
</div>
@endrole

@role('admin')
<div class="card">
    <!-- DataTables -->
    <div class="card-body table-responsive p-2">
        <table id="datatables_archivos" class="display shadow-sm text-capitalize " > 
            <thead>
                <tr>
                    <th>#</th>
                    <th>usuario</th>
                    <th>descripción</th>                    
                    <th>Archivo</th>
                    <th>Fecha</th>
                    <th>Acciones</th>                    
                </tr>
            </thead>    
            <tbody>
                @foreach ($archivos as $archivo)
                    <tr>
                        <td>{{ $archivo->id }}</td>
                        <td>{{ $archivo->usuario->name }}</td>
                        <td>{{ $archivo->arc_descripcion }}</td>
                        <td class="text-truncate" style="max-width: 150px;">{{ $archivo->arc_nombre_archivo }}</td>
                        <td>{{ $archivo->created_at }}</td>                       
                        <td class="d-flex">                            
                            <a href="{{ route('descargar.archivo', $archivo->id) }}" class="btn btn-primary btn-sm mr-2" style=" border-radius: 10px">
                                Descargar
                                <i class="fas fa-download"></i>
                            </a>
                            {{-- <a href="{{ $archivo->arc_url_descarga }}" class="btn btn-primary" download> desc </a>--}}
                            <form action="{{ route('eliminar.archivo', $archivo->id) }}" method="POST" class="d-inline" >
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
                                        style=" border-radius: 10px"
                                        > Eliminar
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
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
        $('#datatables_archivos').DataTable();
    });
</script>

<script>
    let nombreGuardado = ''; // almacenamos el nombre actual
    
    function updateFileName() {
        const archivo = document.getElementById('archivo');
        const archivoDisplay = document.getElementById('selectedFileName');
        
        if (archivo.files.length > 0) {
            const nombre = archivo.files[0].name;
            nombreGuardado = nombre; 
            archivoDisplay.textContent = `Archivo seleccionado: ${nombre}`;
        }
    }
    console.log(nombreGuardado);
</script>

@stop