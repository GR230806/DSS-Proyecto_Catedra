@extends('backend.layouts.master')

@section('title')
    Crear Mascota - Panel de Administración
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
                <h4 class="page-title pull-left">Crear Mascota</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Panel de control</a></li>
                    <li><a href="{{ route('pet.pets.index') }}">Todas las mascotas</a></li>
                    <li><span>Crear mascota</span></li>
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
                    <h4 class="header-title">Crear Nueva Mascota</h4>
                    @include('backend.layouts.partials.messages')
                    
                    <form action="{{ route('pet.pets.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="edad">Edad</label>
                                <input type="number" class="form-control" id="edad" name="edad" placeholder="Ingrese la edad">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="genero">Género</label>
                                <select class="form-control" id="genero" name="genero">
                                    <option value="1">Macho</option>
                                    <option value="0">Hembra</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="tipo_mascota">Tipo de mascota</label>
                                <input type="text" class="form-control" id="tipo_mascota" name="tipo_mascota" placeholder="Ingrese el tipo de mascota">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="raza">Raza</label>
                                <input type="text" class="form-control" id="raza" name="raza" placeholder="Ingrese la raza">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="owner_id">Dueño</label>
                                <select class="form-control" id="owner_id" name="owner_id">
                                    @foreach ($owners as $owner)
                                        <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                                    @endforeach
                                </select>
                                <p>¿No encuentras al dueño? Puedes crear uno <a href="{{ route('admin.admins.create') }}">aquí</a>.</p>
                            </div>
                            

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="comentarios">Comentarios</label>
                                <textarea class="form-control" id="comentarios" name="comentarios" rows="3" placeholder="Ingrese los comentarios"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Guardar Mascota</button>
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
