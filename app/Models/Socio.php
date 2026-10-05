<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'tipo_documento',
    'numero_documento',
    'nombres',
    'apellidos',
    'telefono',
    'email',
    'direccion',
    'fecha_ingreso',
    'estado',
])]
class Socio extends Model
{

    protected function casts(): array
    {
        return [
            'fecha_ingreso' => 'date',
        ];
    }

    public function socioPlanes(): HasMany
    {
        return $this->hasMany(SocioPlan::class);
    }

    public function recaudaciones(): HasMany
    {
        return $this->hasMany(Recaudacion::class);
    }
}
