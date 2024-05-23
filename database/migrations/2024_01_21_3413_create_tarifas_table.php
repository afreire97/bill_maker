<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tarifas', function (Blueprint $table) {
            $table->id('TAR_id');

            $table->foreignId('TAR_producto_id')->constrained('productos', 'PRO_id')->onDelete('cascade');
            $table->foreignId('TAR_emisor_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('TAR_receptor_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->double('TAR_resultante');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarifas');
    }
};
