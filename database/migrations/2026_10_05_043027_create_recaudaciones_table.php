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
        Schema::create('recaudaciones', function (Blueprint $table) {

            $table->id();

            $table->foreignId('socio_id')
                ->constrained('socios')
                ->restrictOnDelete();

            $table->string('numero', 30);

            $table->dateTime('fecha');

            $table->decimal('total', 12, 2);

            $table->string('metodo_pago', 20)
                ->default('EFECTIVO');

            $table->string('estado', 20)
                ->default('REGISTRADA');

            $table->text('observacion')->nullable();

            $table->foreignId('usuario_id')
                ->constrained('users')
                ->restrictOnDelete();

            $table->timestamps();

            $table->unique(
                'numero',
                'uk_recaudaciones_numero'
            );

            $table->index(
                ['socio_id', 'fecha'],
                'idx_recaudaciones_socio_fecha'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recaudaciones');
    }
};
