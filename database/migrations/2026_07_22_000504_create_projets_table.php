<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projets', function (Blueprint $table) {

            $table->id();

            $table->string('reference')->unique();

            $table->string('nom');

            $table->text('description')->nullable();

            $table->foreignId('client_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->date('date_debut');

            $table->date('date_fin')->nullable();

            $table->decimal('budget',12,2);

            $table->enum('statut',[
                'En attente',
                'En cours',
                'Terminé',
                'Suspendu'
            ])->default('En attente');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};