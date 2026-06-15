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
        Schema::create('retiros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cedula', 100);
            $table->string('primer_nombre', 100);
            $table->string('primer_apellido', 100);
            $table->string('ubicacion', 100);
            $table->string('cargo', 100);
            $table->string('acueducto', 100);
            $table->string('departamento', 100);
            $table->date('fecha');
            $table->string('tipo_retiro', 10);
            $table->string('status', 10);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retiros');
    }
};
