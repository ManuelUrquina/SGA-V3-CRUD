@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

    <div class="d-flex justify-content-between">
        <h1 class="m-0 text-dark">Home</h1>
        <div>
            @role('admin')<p class="badge text-success fs-6">Admin</p>@endrole
            @role('instructor')<p class="badge text-success fs-6">Instructor</p>@endrole
            @role('aprendiz')<p class="badge text-success fs-6">Aprendiz</p>@endrole
            {{-- @hasanyrole('admin|usuario') <p class=“badge text-success fs-6”>Admin o usuario</p> @endhasanyrole --}}
        </div>
    </div>

@stop

@section('content')
<!-- notificacion  -->
@if (session()->has('acceso_denegado'))
    <div class="alert alert-danger " role="alert">
        <strong>{{ session('acceso_denegado') }}</strong>
    </div>
@endif

<div class="fondo ">
    <div class="row g-3">
        <div class="col-md-3">
            <x-adminlte-small-box title="{{ count($centros) }}" text="Centros" icon="fas fa-synagogue text-dark" theme="success" url="/centros" url-text="Ver centros"/>
        </div>
        <div class="col-md-3">
            <x-adminlte-small-box title="{{ $archivos }}" text="Archivos" icon="fas fa-file-alt text-dark" theme="success" url="#" url-text="Ver archivos"/>
        </div>
        <div class="col-md-3">
            <x-adminlte-small-box title="{{$usersCount}}" text="Usuarios" icon="fas fa-user-plus text-dark" theme="success" url="/usuarios" url-text="Ver usuarios"/>
        </div>
        <div class="col-md-3 ">
            <x-adminlte-small-box title="{{$conteoProgramas}}" text="Programas" icon="fas fa-graduation-cap text-dark" theme="success" url="/programas" url-text="Ver programas" />
        </div>
        <div class="col-md-3 ">
            <x-adminlte-small-box title="{{ $fichas }}" text="Fichas" icon="fas fa-tags text-dark" theme="success" url="/fichas" url-text="Ver fichas" />
        </div>
        <div class="col-md-3 ">
            <x-adminlte-small-box title="{{ $vigencias }}" text="viegencia" icon="fas fa-folder text-dark" theme="success" url="/vigencias" url-text="Ver vigencia" />
        </div>
        <div class="col-md-3 ">
            <x-adminlte-small-box title="{{ $instructores }}" text="Instructores" icon="fas fa-id-badge text-dark" theme="success" url="/instructores" url-text="Ver instructores"/>
        </div>
        <div class="col-md-3 ">
            <x-adminlte-small-box title="{{ $regionales }}" text="Regionales" icon="fas fa-map text-dark" theme="success" url="/regionales" url-text="Ver regionales"/>
        </div>
    </div>
</div>

@stop

@section('css')
<style>
    .fondo {
        background-image: url("{{ asset('img/webb.png') }}");
        height: 100vh;
        /* background-size: cover;
        background-position: center; */
        /* background-repeat: no-repeat; */
    }
</style>

@endsection

@push('js')
<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
@endpush
