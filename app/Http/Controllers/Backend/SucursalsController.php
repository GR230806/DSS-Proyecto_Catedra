<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Sucursales;
use Illuminate\Http\Request;

class SucursalsController extends Controller
{
    /**
     * Muestra una lista de recursos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucursales = Sucursales::all();
        return view('backend.pages.branches.index', compact('sucursales'));
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.branches.create');
    }

    /**
     * Almacena un recurso recién creado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|max:255',
            'direccion' => 'required|max:255',
            'activa' => 'required|boolean',
        ]);

        // Crear nueva sucursal
        Sucursales::create($request->all());

        session()->flash('success', '¡La sucursal ha sido creada correctamente!');
        return redirect()->route('sucursal.sucursals.index');
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch = Sucursales::find($id);
        return view('backend.pages.branches.edit', compact('branch'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|max:255',
            'direccion' => 'required|max:255',
            'activa' => 'required|boolean',
        ]);

        // Actualizar sucursal
        $branch = Sucursales::find($id);
        $branch->update($request->all());

        session()->flash('success', '¡La sucursal ha sido actualizada correctamente!');
        return redirect()->route('admin.branches.index');
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Sucursales::find($id);
        if (!is_null($branch)) {
            $branch->delete();
        }

        session()->flash('success', '¡La sucursal ha sido eliminada correctamente!');
        return back();
    }
}
