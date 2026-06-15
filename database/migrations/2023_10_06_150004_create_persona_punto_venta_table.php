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
        Schema::create('persona_punto_venta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('segunda_cedula', 100);
            $table->string('segundo_nombre', 100);
            $table->string('segundo_apellido', 100);
            $table->string('segunda_ubicacion', 100);
            $table->string('segundo_cargo', 100);
            $table->string('segundo_acueducto', 100);
            $table->string('segundo_departamento', 100);
            $table->string('sim', 100);
            $table->string('marca', 100);
            $table->string('modelo', 100);
            $table->string('imeil', 100);
            $table->string('serial', 100);
            $table->string('nroBien', 100);
            $table->string('antena', 100);
            $table->date('fecha');
            $table->string('status', 50);
            $table->bigInteger('id_retiro')->unsigned();
            $table->foreign('id_retiro')->references('id')->on('retiros')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persona_punto_venta');
    }
};
