<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'fecha_apertura',
    'fecha_cierre',
    'saldo_inicial',
    'saldo_final',
    'estado',
    'usuario_apertura_id',
    'usuario_cierre_id',
    'observacion',
])]
class Caja extends Model
{
    protected function casts(): array
    {
        return [
            'fecha_apertura' => 'datetime',
            'fecha_cierre' => 'datetime',
            'saldo_inicial' => 'decimal:2',
            'saldo_final' => 'decimal:2',
        ];
    }

    public function usuarioApertura(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'usuario_apertura_id'
        );
    }

    public function usuarioCierre(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'usuario_cierre_id'
        );
    }

    public function movimientos(): HasMany
    {
        return $this->hasMany(MovimientoCaja::class);
    }
}
