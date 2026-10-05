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
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('socio_plan_id')
                ->constrained('socio_planes')
                ->restrictOnDelete();

            $table->foreignId('recaudacion_detalle_id')
                ->nullable()
                ->constrained('recaudacion_detalles')
                ->restrictOnDelete();

            $table->string('tipo', 20);

            $table->decimal('monto', 12, 2);

            $table->dateTime('fecha');

            $table->string('estado', 20)
                ->default('REGISTRADO');

            $table->text('observacion')->nullable();

            $table->foreignId('usuario_id')
                ->constrained('users')
                ->restrictOnDelete();

            $table->timestamps();

            $table->index(
                ['socio_plan_id', 'fecha'],
                'idx_movimientos_socio_plan_fecha'
            );

            $table->index(
                ['tipo', 'estado'],
                'idx_movimientos_tipo_estado'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }
};
