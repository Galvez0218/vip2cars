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
        Schema::create('suscriptores', function (Blueprint $table) {
            $table->id('id_suscriptor');
            $table->foreignId('id_evento')->constrained(
                'eventos',
                'id_evento'
            );
            $table->string('nombres', 250);
            $table->string('apellidos', 250);
            $table->string('correo', 250);
            $table->string('celular', 150);
            $table->enum('genero', ['M', 'F']);
            $table->string('nro_documento');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suscriptores');
    }
};
