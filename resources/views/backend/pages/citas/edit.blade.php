@extends('backend.layouts.master')

@section('title')
    Editar Cita - Panel de Administración
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Editar Cita - {{ $cita->id }}</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Panel de control</a></li>
                    <li><a href="{{ route('citas.index') }}">Todas las citas</a></li>
                    <li><span>Editar cita - {{ $cita->id }}</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Editar Cita - {{ $cita->id }}</h4>
                    @include('backend.layouts.partials.messages')
                    
                    <form action="{{ route('citas.update', $cita->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="fecha_hora">Fecha y hora</label>
                                <input type="datetime-local" class="form-control" id="fecha_hora" name="fecha_hora" placeholder="Ingrese la fecha y hora" value="{{ $cita->fecha_hora }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="duracion">Duración (minutos)</label>
                                <input type="number" class="form-control" id="duracion" name="duracion" placeholder="Ingrese la duración" value="{{ $cita->duracion }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="tipo">Tipo</label>
                                <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Ingrese el tipo" value="{{ $cita->tipo }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="estado">Estado</label>
                                <input type="text" class="form-control" id="estado" name="estado" placeholder="Ingrese el estado" value="{{ $cita->estado }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="notas">Notas</label>
                                <textarea class="form-control" id="notas" name="notas" rows="3" placeholder="Ingrese las notas">{{ $cita->notas }}</textarea>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="mascota_id">Mascota</label>
                                <select class="form-control" id="mascota_id" name="mascota_id">
                                    @foreach ($mascotas as $mascota)
                                        <option value="{{ $mascota->id }}" {{ $cita->mascota_id == $mascota->id ? 'selected' : '' }}>{{ $mascota->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-6 col-sm-12">
                            <label for="admin_id">Administrador</label>
                            <select class="form-control" id="admin_id" name="admin_id">
                                @foreach ($admins as $admin)
                                    <option value="{{ $admin->id }}" {{ $cita->admin_id == $admin->id ? 'selected' : '' }}>{{ $admin->name }}</option>
                                @endforeach
                            </select>
                            <p>¿No encuentras al administrador? Puedes crear uno <a href="{{ route('admin.admins.create') }}">aquí</a>.</p>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Guardar Cita</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    })
</script>
@endsection
