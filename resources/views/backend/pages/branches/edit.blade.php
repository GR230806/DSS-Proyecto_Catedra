@extends('backend.layouts.master')

@section('title')
    Editar Sucursal - Panel de Administración
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
                <h4 class="page-title pull-left">Editar Sucursal - {{ $branch->nombre }}</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Panel de control</a></li>
                    <li><a href="{{ route('admin.branches.index') }}">Todas las sucursales</a></li>
                    <li><span>Editar sucursal - {{ $branch->nombre }}</span></li>
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
                    <h4 class="header-title">Editar Sucursal - {{ $branch->nombre }}</h4>
                    @include('backend.layouts.partials.messages')
                    
                    <form action="{{ route('admin.branches.update', $branch->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre" value="{{ $branch->nombre }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la dirección" value="{{ $branch->direccion }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="activa">Activa</label>
                                <select class="form-control" id="activa" name="activa">
                                    <option value="1" {{ $branch->activa == 1 ? 'selected' : '' }}>Sí</option>
                                    <option value="0" {{ $branch->activa == 0 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Guardar Sucursal</button>
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
