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
        Schema::create('recaudacion_detalles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('recaudacion_id')
                ->constrained('recaudaciones')
                ->restrictOnDelete();

            $table->foreignId('socio_plan_id')
                ->constrained('socio_planes')
                ->restrictOnDelete();

            $table->decimal('monto', 12, 2);

            $table->text('observacion')->nullable();

            $table->timestamps();

            $table->index(
                ['recaudacion_id', 'socio_plan_id'],
                'idx_recaudacion_detalles_recaudacion_plan'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recaudacion_detalles');
    }
};
