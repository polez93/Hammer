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
        Schema::create('recibos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_vehiculo');
            $table->foreign('id_vehiculo')->references('id')->on('vehiculos')->onDelete('cascade');
            $table->unsignedBigInteger('id_producto');
            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
            $table->float('peso');
            $table->date('fecha');
            $table->time('hora');
            $table->enum('estado',['A','I'])->default('A');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recibos');
    }
};
