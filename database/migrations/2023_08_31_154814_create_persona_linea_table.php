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
        Schema::create('persona_linea', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('segunda_cedula');
            $table->string('segundo_nombre', 100);
            $table->string('segundo_apellido', 100);
            $table->string('segunda_ubicacion', 100);
            $table->string('segundo_cargo', 100);
            $table->string('segundo_acueducto', 100);
            $table->string('segundo_departamento', 100);
            $table->string('numero_linea', 100);
            $table->string('numero_sim', 100);
            $table->bigInteger('telefonia')->unsigned();
            $table->foreign('telefonia')->references('id')->on('telefonias')->onDelete('cascade');
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
        Schema::dropIfExists('persona_linea');
    }
};
