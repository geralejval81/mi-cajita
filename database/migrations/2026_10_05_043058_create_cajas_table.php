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
        Schema::create('cajas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_apertura');
            $table->dateTime('fecha_cierre')->nullable();

            $table->decimal('saldo_inicial', 12, 2);
            $table->decimal('saldo_final', 12, 2)->nullable();

            $table->string('estado', 20)
                ->default('ABIERTA');

            $table->foreignId('usuario_apertura_id')
                ->constrained('users')
                ->restrictOnDelete();

            $table->foreignId('usuario_cierre_id')
                ->nullable()
                ->constrained('users')
                ->restrictOnDelete();

            $table->text('observacion')->nullable();

            $table->timestamps();

            $table->index(
                ['estado', 'fecha_apertura'],
                'idx_cajas_estado_fecha'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cajas');
    }
};
