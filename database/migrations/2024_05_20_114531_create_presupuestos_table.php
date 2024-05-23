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
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->id('PRE_id');
            $table->integer('PRE_habitaciones')->default(1);
            $table->boolean('PRE_is_checkin')->default(0);
            $table->boolean('PRE_is_pms')->default(0);
            $table->boolean('PRE_is_cerraduras')->default(0);
            $table->boolean('PRE_is_gestion_cobros')->default(0);

            // Oculto
            // se calcula en base al total anual
            $table->double('PRE_comision')->default(0.2);

            // $table->boolean('PRE_is_idioma')->default(0);
            // $table->integer('PRE_idioma')->default(0);

            $table->double('PRE_tarifaMensual')->nullable();
            $table->double('PRE_tarifaAnual')->nullable();

            $table->date('PRE_fecha_cancelacion')->nullable();
            $table->date('PRE_fecha_aceptacion')->nullable();

            $table->foreignId('PRE_estado')->constrained('estados_presupuestos', 'EST_id')->onDelete('cascade');

            $table->foreignId('PRE_cliente_id')->constrained('clientes', 'CLI_id')->onDelete('cascade');
            $table->foreignId('PRE_distribuidor_id')->constrained('distribuidores', 'DIS_id')->onDelete('cascade');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presupuestos');
    }
};
