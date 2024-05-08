<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PetsController extends Controller
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
        if ($this->user->es_duenio) {
            $pets = $this->user->mascotas;
        } else {
            $pets = Pet::all();
        }
        
        return view('backend.pages.pets.index', compact('pets'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners = Admin::where('es_duenio', true)->get();

    
        return view('backend.pages.pets.create', compact('owners'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation Data
        $request->validate([
            'nombre' => 'required|max:255',
            'edad' => 'required|integer',
            'genero' => 'required|boolean',
            'tipo_mascota' => 'required|max:255',
            'raza' => 'nullable|max:255',
            'comentarios' => 'nullable',
        ]);

        // Create New Pet
        Pet::create($request->all());

        session()->flash('success', 'Pet has been created !!');
        return redirect()->route('admin.pets.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pet = Pet::find($id);
        return view('backend.pages.pets.edit', compact('pet'));
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
        // Validation Data
        $request->validate([
            'nombre' => 'required|max:255',
            'edad' => 'required|integer',
            'genero' => 'required|boolean',
            'tipo_mascota' => 'required|max:255',
            'raza' => 'nullable|max:255',
            'comentarios' => 'nullable',
        ]);

        // Update Pet
        $pet = Pet::find($id);
        $pet->update($request->all());

        session()->flash('success', 'Pet has been updated !!');
        return redirect()->route('admin.pets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pet = Pet::find($id);
        if (!is_null($pet)) {
            $pet->delete();
        }

        session()->flash('success', 'Pet has been deleted !!');
        return back();
    }
}
