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
        Schema::create('personas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cedula');
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('telefono', 11);
            $table->string('telefono_ubicacion', 11);
            $table->string('ubicacion')->unsigned();
            $table->bigInteger('id_departamento')->unsigned();
            $table->foreign('id_departamento')->references('id')->on('departamentos')->onDelete('cascade');
            $table->bigInteger('id_cargo')->unsigned();
            $table->foreign('id_cargo')->references('id')->on('cargos')->onDelete('cascade');
            $table->bigInteger('id_acueducto')->unsigned();
            $table->foreign('id_acueducto')->references('id')->on('acueductos')->onDelete('cascade');
            $table->string('status', 7);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
