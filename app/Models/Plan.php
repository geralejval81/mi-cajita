<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'nombre',
    'descripcion',
    'meta_monto',
    'fecha_inicio',
    'fecha_fin',
    'estado',
    ])]
class Plan extends Model
{
    protected $table = 'planes';

    protected function casts(): array
    {
        return [
            'meta_monto' => 'decimal:2',
            'fecha_inicio' => 'date',
            'fecha_fin' => 'date',
        ];
    }

    public function socioPlanes(): HasMany
    {
        return $this->hasMany(SocioPlan::class);
    }
}
