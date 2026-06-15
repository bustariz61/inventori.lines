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
        Schema::create('comunicacion_interna', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('para', 100);
            $table->string('de', 100);
            $table->string('cc', 100);
            $table->string('asunto');
            $table->text('texto');
            $table->string('status', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comunicacion_interna');
    }
};
