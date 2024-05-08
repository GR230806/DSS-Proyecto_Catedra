<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_hora',
        'duracion',
        'tipo',
        'estado',
        'notas',
        'mascota_id',
        'admin_id',
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
