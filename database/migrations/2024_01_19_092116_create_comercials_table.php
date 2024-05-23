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
        Schema::create('comerciales', function (Blueprint $table) {
            $table->id('COM_id');
            $table->string('COM_nombre');
            $table->string('COM_direccion');
            $table->string('COM_telefono');
            $table->string('COM_cif');
            $table->string('COM_logo');
            $table->foreignId('COM_user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('COM_distribuidor_id')->nullable()->constrained('distribuidores', 'DIS_id')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comerciales');
    }
};
