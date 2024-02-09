@extends('adminlte::page')

@section('title', 'Regionales')

@section('content_header')
    <h1>Regionales</h1>
@stop

@section('content')
    <div class="alert alert-success" role="alert">
        <strong>sección en construcción 🛠</strong> 
    </div>  


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