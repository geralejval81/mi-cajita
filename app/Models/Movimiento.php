<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'socio_plan_id',
    'recaudacion_detalle_id',
    'tipo',
    'monto',
    'fecha',
    'estado',
    'observacion',
    'usuario_id',
])]
class Movimiento extends Model
{
    protected function casts(): array
    {
        return [
            'monto' => 'decimal:2',
            'fecha' => 'datetime',
        ];
    }

    public function socioPlan(): BelongsTo
    {
        return $this->belongsTo(SocioPlan::class);
    }

    public function recaudacionDetalle(): BelongsTo
    {
        return $this->belongsTo(RecaudacionDetalle::class);
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
