<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'nombre', 'edad', 'genero', 'tipo_mascota', 'raza', 'comentarios', 'admin_id'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}









