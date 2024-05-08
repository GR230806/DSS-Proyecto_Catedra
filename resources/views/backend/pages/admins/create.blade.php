
@extends('backend.layouts.master')

@section('title')
Crear - Admin Panel
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
                <h4 class="page-title pull-left">Crear Usuario</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.admins.index') }}">Usuarios</a></li>
                    <li><span>Crear Usuario</span></li>
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
                    <h4 class="header-title">Crear Usuario</h4>
                    @include('backend.layouts.partials.messages')
                    
                    <form action="{{ route('admin.admins.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">Nombre usuario</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="email">Correo usuario</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="password_confirmation">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Password">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-6">
                                <label for="password">Asignar Rol</label>
                                <select name="roles[]" id="roles" class="form-control select2" multiple>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-6">
                                <label for="username">Usuario del sistema</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
                            </div>
                        </div>

                        <div class="form-row"> 
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="sucursal_id">Sucursal</label>
                                <select name="sucursal_id" id="sucursal_id" class="form-control">
                                    @foreach ($sucursales as $sucursal)
                                        <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="es_duenio">¿Es dueño?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="es_duenio" name="es_duenio" value="1">
                                    <label class="form-check-label" for="es_duenio">
                                        Sí
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Admin</button>
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