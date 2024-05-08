<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('phone_number')->nullable(); // Campo para el número de teléfono
            $table->integer('role_id')->nullable(); // Campo para el ID del rol
            $table->integer('clinic_id')->nullable(); // Campo para el ID de la clínica
            $table->string('profile_picture')->nullable(); // Campo para la imagen de perfil
            $table->string('address')->nullable(); // Campo para la dirección
            $table->string('city')->nullable(); // Campo para la ciudad
            $table->boolean('active')->nullable(); // Campo para indicar si el usuario está activo
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
