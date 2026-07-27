<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('materiels', function (Blueprint $table) {

            $table->id();

            $table->string('nom');

            $table->string('categorie');

            $table->string('marque')->nullable();

            $table->integer('quantite')->default(0);

            $table->enum('etat',[
                'Disponible',
                'En service',
                'Maintenance'
            ])->default('Disponible');

            $table->text('description')->nullable();

            $table->foreignId('chantier_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materiels');
    }
};