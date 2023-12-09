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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->unsignedBigInteger('vehiculo_id');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->float('peso_int');
            $table->time('hora_int');
            $table->date('fecha_int');
            $table->float('peso_sal')->nullable();
            $table->integer('peso_neto')->nullable();
            $table->enum('tipo_ventas', ['CREDITO','CONTADO']);
            $table->enum('esto_pedido', ['P','C'])->default('P');
            $table->float('total')->nullable();
            $table->date('fecha_salida')->nullable();
            $table->time('hora_salida')->nullable();
            $table->enum('estado',['A','B'])->default('A');          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
