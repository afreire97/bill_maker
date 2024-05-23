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
        Schema::create('distribuidores', function (Blueprint $table) {
            $table->id('DIS_id');
            $table->string('DIS_nombre');
            $table->string('DIS_direccion');
            $table->string('DIS_telefono');
            $table->string('DIS_cif');
            $table->string('DIS_logo');
            $table->foreignId('DIS_user_id')->nullable()->constrained('users', 'id')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribuidors');
    }
};
