<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'usuario@gmail.com')->first();
        if (is_null($user)) {
            $user = new User();
            $user->name = "ale";
            $user->email = "usuario@gmail.com";
            $user->password = Hash::make('123');
            $user->phone_number = "123"; // Número de teléfono
            $user->clinic_id = 1; // ID de la clínica
            $user->profile_picture = "profile.jpg"; // Imagen de perfil
            $user->address = "Calle Principal 123"; // Dirección
            $user->city = "Ciudad"; // Ciudad
            $user->active = true; // Usuario activo
            $user->save();
        }
    }
}