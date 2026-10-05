<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'socio_id',
    'plan_id',
    'fecha_ingreso',
    'fecha_retiro',
    'estado',
])]
class SocioPlan extends Model
{
    protected $table = 'socio_planes';

    protected function casts(): array
    {
        return [
            'fecha_ingreso' => 'date',
            'fecha_retiro' => 'date',
        ];
    }

    public function socio(): BelongsTo
    {
        return $this->belongsTo(Socio::class);
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    public function movimientos(): HasMany
    {
        return $this->hasMany(Movimiento::class);
    }
}
