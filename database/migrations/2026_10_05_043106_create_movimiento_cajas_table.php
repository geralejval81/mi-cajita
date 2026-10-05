<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movimiento_cajas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('caja_id')
                ->constrained('cajas')
                ->restrictOnDelete();

            $table->foreignId('recaudacion_id')
                ->nullable()
                ->constrained('recaudaciones')
                ->restrictOnDelete();

            $table->foreignId('movimiento_id')
                ->nullable()
                ->constrained('movimientos')
                ->restrictOnDelete();

            $table->string('tipo', 20);

            $table->decimal('monto', 12, 2);

            $table->dateTime('fecha');

            $table->text('observacion')->nullable();

            $table->timestamps();

            $table->index(
                ['caja_id', 'fecha'],
                'idx_movimiento_cajas_caja_fecha'
            );

            $table->index(
                ['tipo', 'fecha'],
                'idx_movimiento_cajas_tipo_fecha'
            );

            $table->unique(
                'recaudacion_id',
                'uk_movimiento_caja_recaudacion'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimiento_cajas');
    }
};
