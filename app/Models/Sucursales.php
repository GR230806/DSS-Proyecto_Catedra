<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursales extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'direccion',
        'activo',
    ];

    /**
     * Relación uno a muchos con admins.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function admins()
    {
        return $this->hasMany(Admin::class);
    }
}
