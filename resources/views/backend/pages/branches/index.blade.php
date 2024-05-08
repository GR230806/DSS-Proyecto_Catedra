@extends('backend.layouts.master')

@section('title')
Sucursales - Panel de Administración
@endsection

@section('styles')
    <!-- Incluir estilos de datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection

@section('admin-content')

<!-- Área de título de la página -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Sucursales</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Panel de control</a></li>
                    <li><span>Todas las sucursales</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- Fin del área de título -->

<div class="main-content-inner">
    <div class="row">
        <!-- Inicio de la tabla de datos -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">Listado de Sucursales</h4>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="5%">N°</th>
                                    <th width="40%">Nombre</th>
                                    <th width="40%">Dirección</th>
                                    <th width="15%">Activo</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($sucursales as $sucursal)
                               <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $sucursal->nombre }}</td>
                                    <td>{{ $sucursal->direccion }}</td>
                                    <td>{{ $sucursal->activo ? 'Sí' : 'No' }}</td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin de la tabla de datos -->
        
    </div>
</div>
@endsection

@section('scripts')
     <!-- Incluir scripts de datatable -->
     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
     
     <script>
         /*================================
        Activar datatable
        ==================================*/
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }

     </script>
@endsection
