<?php

use Illuminate\Database\Seeder;
use App\Models\Sucursales;


class SucursalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     * 
     */
    public function run(): void
    {

        $sucursal = Sucursales::where('nombre', '1')->first();
        // Ejemplo de creación de una sucursal
        if (is_null($sucursal)) {
            $sucursal = new Sucursal();
            $sucursal->nombre = "Sucursal Central";
            $sucursal->direccion = "Sucursal 123";
            $sucursal->activo = true;
            
        }

        // Agregar más sucursales aqui
    }
}
