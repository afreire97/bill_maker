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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('CLI_id');
            $table->string('CLI_nombre');
            $table->string('CLI_direccion');
            $table->string('CLI_telefono');
            $table->string('CLI_email');
            $table->string('CLI_cif');

            $table->foreignId('CLI_comercial_id')->nullable()->constrained('comerciales', 'COM_id')->onDelete('cascade');
            $table->foreignId('CLI_distribuidor_id')->nullable()->constrained('distribuidores', 'DIS_id')->onDelete('cascade');

            $table->foreignId('CLI_tipo_id')->constrained('clientes_tipos', 'CLI_TIP_id')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
