 <!-- sidebar menu area start -->
 @php
     $usr = Auth::guard('admin')->user();
 @endphp
 <div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}">
                <h2 class="text-white">Admin</h2> 
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">

                   


                    @if ($usr->es_duenio)


                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Dueño
                        </span></a>
                        <ul class="collapse {{ Route::is('pet.pets.create') || Route::is('pet.pets.index') || Route::is('pet.pets.edit') || Route::is('pet.pets.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('pet.view'))
                                <li class="{{ Route::is('pet.pets.index')  || Route::is('pet.pets.edit') ? 'active' : '' }}"><a href="{{ route('pet.pets.index') }}">Listar Mascotas</a></li>
                            @endif
                        </ul>
                    </li>

                    @if ($usr->can('cita.create') || $usr->can('cita.view') ||  $usr->can('cita.edit') ||  $usr->can('user.delete'))
                                        <li>
                                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                                                Citas
                                            </span></a>
                                            <ul class="collapse {{ Route::is('cita.citas.create') || Route::is('cita.citas.index') || Route::is('cita.citas.edit') || Route::is('cita.citas.show') ? 'in' : '' }}">
                                                
                                                @if ($usr->can('cita.view'))
                                                    <li class="{{ Route::is('cita.citas.index')  || Route::is('cita.citas.edit') ? 'active' : '' }}"><a href="{{ route('cita.citas.index') }}">Listar Citas</a></li>
                                                @endif

                                                @if ($usr->can('cita.create'))
                                                    <li class="{{ Route::is('cita.citas.create')  ? 'active' : '' }}"><a href="{{ route('cita.citas.create') }}">Crear Cita</a></li>
                                                @endif
                                            </ul>
                                        </li>
                                        @endif



                    @endif


                    @if (!$usr->es_duenio)

                    @if ($usr->can('dashboard.view'))
                    <li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        </ul>
                    </li>
                    @endif


                    @if ($usr->can('sucursal.create') || $usr->can('sucursal.view') ||  $usr->can('sucursal.edit') ||  $usr->can('sucursal.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Sucursales
                        </span></a>
                        <ul class="collapse {{ Route::is('sucursal.sucursals.create') || Route::is('sucursal.sucursals.index') || Route::is('sucursal.sucursals.edit') || Route::is('sucursal.sucursals.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('sucursal.view'))
                                <li class="{{ Route::is('sucursal.sucursals.index')  || Route::is('sucursal.sucursals.edit') ? 'active' : '' }}"><a href="{{ route('sucursal.sucursals.index') }}">Listar Sucursales</a></li>
                            @endif

                            @if ($usr->can('sucursal.create'))
                                <li class="{{ Route::is('sucursal.sucursals.create')  ? 'active' : '' }}"><a href="{{ route('sucursal.sucursals.create') }}">Crear Sucursal</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                            Roles y Permisos 
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                            @if ($usr->can('role.view'))
                                <li class="{{ Route::is('admin.roles.index')  || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles.index') }}">Listar Roles</a></li>
                            @endif
                            @if ($usr->can('role.create'))
                                <li class="{{ Route::is('admin.roles.create')  ? 'active' : '' }}"><a href="{{ route('admin.roles.create') }}">Crear Rol</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    
                    @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Usuarios
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.admins.index')  || Route::is('admin.admins.edit') ? 'active' : '' }}"><a href="{{ route('admin.admins.index') }}">Listar Usuarios</a></li>
                            @endif

                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.admins.create')  ? 'active' : '' }}"><a href="{{ route('admin.admins.create') }}">Crear Usuario</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    {{-- @if ($usr->can('user.create') || $usr->can('user.view') ||  $usr->can('user.edit') ||  $usr->can('user.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Usuarios
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.users.create') || Route::is('admin.users.index') || Route::is('admin.users.edit') || Route::is('admin.users.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('user.view'))
                                <li class="{{ Route::is('admin.users.index')  || Route::is('admin.users.edit') ? 'active' : '' }}"><a href="{{ route('admin.users.index') }}">Listar Usuarios</a></li>
                            @endif

                            @if ($usr->can('user.create'))
                                <li class="{{ Route::is('admin.users.create')  ? 'active' : '' }}"><a href="{{ route('admin.users.create') }}">Crear Usuario</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif --}}


                    @if ($usr->can('user.create') || $usr->can('user.view') ||  $usr->can('user.edit') ||  $usr->can('user.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Mascotas
                        </span></a>
                        <ul class="collapse {{ Route::is('pet.pets.create') || Route::is('pet.pets.index') || Route::is('pet.pets.edit') || Route::is('pet.pets.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('pet.view'))
                                <li class="{{ Route::is('pet.pets.index')  || Route::is('pet.pets.edit') ? 'active' : '' }}"><a href="{{ route('pet.pets.index') }}">Listar Mascotas</a></li>
                            @endif

                            @if ($usr->can('pet.create'))
                                <li class="{{ Route::is('pet.pets.create')  ? 'active' : '' }}"><a href="{{ route('pet.pets.create') }}">Crear Mascota</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('cita.create') || $usr->can('cita.view') ||  $usr->can('cita.edit') ||  $usr->can('user.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Citas
                        </span></a>
                        <ul class="collapse {{ Route::is('cita.citas.create') || Route::is('cita.citas.index') || Route::is('cita.citas.edit') || Route::is('cita.citas.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('cita.view'))
                                <li class="{{ Route::is('cita.citas.index')  || Route::is('cita.citas.edit') ? 'active' : '' }}"><a href="{{ route('cita.citas.index') }}">Listar Citas</a></li>
                            @endif

                            @if ($usr->can('cita.create'))
                                <li class="{{ Route::is('cita.citas.create')  ? 'active' : '' }}"><a href="{{ route('cita.citas.create') }}">Crear Cita</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    @endif





                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->