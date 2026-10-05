<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'recaudacion_id',
    'socio_plan_id',
    'monto',
    'observacion',
])]
class RecaudacionDetalle extends Model
{
    protected function casts(): array
    {
        return [
            'monto' => 'decimal:2',
        ];
    }

    public function recaudacion(): BelongsTo
    {
        return $this->belongsTo(Recaudacion::class);
    }

    public function socioPlan(): BelongsTo
    {
        return $this->belongsTo(SocioPlan::class);
    }
}
