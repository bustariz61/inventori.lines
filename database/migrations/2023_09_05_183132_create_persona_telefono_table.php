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
        Schema::create('persona_telefono', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('segunda_cedula', 100);
            $table->string('segundo_nombre', 100);
            $table->string('segundo_apellido', 100);
            $table->string('segunda_ubicacion', 100);
            $table->string('segundo_cargo', 100);
            $table->string('segundo_acueducto', 100);
            $table->string('segundo_departamento', 100);
            $table->string('marca', 100);
            $table->string('color', 100);
            $table->string('serial', 100);
            $table->string('cargador', 100);
            $table->string('protector_pantalla', 100);
            $table->string('forro', 100);
            $table->string('activo', 100);
            $table->string('imei1', 100);
            $table->string('imei2', 100)->nullable();
            $table->date('fecha');
            $table->bigInteger('id_retiro')->unsigned();
            $table->foreign('id_retiro')->references('id')->on('retiros')->onDelete('cascade');
            $table->string('status', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retiros_telefonos');
    }
};
