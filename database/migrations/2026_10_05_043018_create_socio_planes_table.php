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
        Schema::create('socio_planes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('socio_id')
                ->constrained('socios')
                ->restrictOnDelete();

            $table->foreignId('plan_id')
                ->constrained('planes')
                ->restrictOnDelete();

            $table->date('fecha_ingreso');
            $table->date('fecha_retiro')->nullable();

            $table->string('estado', 20)->default('ACTIVO');
            $table->timestamps();

            $table->index(
                ['socio_id', 'estado'],
                'idx_socio_planes_socio_estado'
            );

            $table->index(
                ['plan_id', 'estado'],
                'idx_socio_planes_plan_estado'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socio_planes');
    }
};
