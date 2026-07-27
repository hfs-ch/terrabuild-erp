<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chantiers', function (Blueprint $table) {

            $table->id();

            $table->string('nom');

            $table->text('description')->nullable();

            $table->string('adresse');

            $table->date('date_debut');

            $table->date('date_fin')->nullable();

            $table->enum('statut',[
                'En préparation',
                'En cours',
                'Suspendu',
                'Terminé'
            ])->default('En préparation');

            $table->foreignId('projet_id')
                    ->constrained()
                    ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chantiers');
    }
};