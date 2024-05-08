<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\Pet;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CitasController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = Cita::all();
        return view('backend.pages.citas.index', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
        $mascotas = collect(['' => 'No hay mascotas']);
        
        if ($this->user->es_duenio) {
            $mascotas = $this->user->mascotas; // Obtener todas las mascotas del usuario autenticado que es dueño
        } else {
            $mascotas = Pet::all(); // Obtener todas las mascotas
        }
    
        // Verificar si la lista de mascotas está vacía y agregar un valor vacío si es así

    
        $admins = Admin::where('es_duenio', false)->get(); // Obtener todos los admins que son dueños
    
        return view('backend.pages.citas.create', compact('mascotas', 'admins'));
    }
    
    
    

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'fecha_hora' => 'required|date',
            'duracion' => 'required|integer',
            'tipo' => 'required|string',
            'estado' => 'required|string',
            'notas' => 'nullable|string',
            'mascota_id' => 'required|exists:mascotas,id',
            'admin_id' => 'required|exists:admins,id',
        ]);

        // Crear nueva cita
        Cita::create($request->all());

        session()->flash('success', 'Cita creada exitosamente.');
        return redirect()->route('citas.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cita = Cita::find($id);
        return view('backend.pages.citas.edit', compact('cita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validación de datos
        $request->validate([
            'fecha_hora' => 'required|date',
            'duracion' => 'required|integer',
            'tipo' => 'required|string',
            'estado' => 'required|string',
            'notas' => 'nullable|string',
            'mascota_id' => 'required|exists:mascotas,id',
            'admin_id' => 'required|exists:admins,id',
        ]);

        // Actualizar cita
        $cita = Cita::find($id);
        $cita->update($request->all());

        session()->flash('success', 'Cita actualizada exitosamente.');
        return redirect()->route('citas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = Cita::find($id);
        if (!is_null($cita)) {
            $cita->delete();
        }

        session()->flash('success', 'Cita eliminada exitosamente.');
        return back();
    }
}
