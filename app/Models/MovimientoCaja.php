<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'caja_id',
    'recaudacion_id',
    'movimiento_id',
    'tipo',
    'monto',
    'fecha',
    'observacion',
])]
class MovimientoCaja extends Model
{
    protected function casts(): array
    {
        return [
            'monto' => 'decimal:2',
            'fecha' => 'datetime',
        ];
    }

    public function caja(): BelongsTo
    {
        return $this->belongsTo(Caja::class);
    }

    public function recaudacion(): BelongsTo
    {
        return $this->belongsTo(Recaudacion::class);
    }

    public function movimiento(): BelongsTo
    {
        return $this->belongsTo(Movimiento::class);
    }
}
