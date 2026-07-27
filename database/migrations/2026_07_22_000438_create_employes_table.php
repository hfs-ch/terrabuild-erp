<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employes', function (Blueprint $table) {

            $table->id();

            $table->string('matricule')->unique();

            $table->string('nom');

            $table->string('prenom');

            $table->date('date_naissance')->nullable();

            $table->enum('sexe',['Homme','Femme']);

            $table->string('telephone');

            $table->string('email')->nullable();

            $table->text('adresse')->nullable();

            $table->date('date_embauche');

            $table->string('poste');

            $table->decimal('salaire',10,2);

            $table->enum('statut',[
                'Actif',
                'Suspendu',
                'Congé'
            ])->default('Actif');

            $table->foreignId('user_id')
                    ->nullable()
                    ->constrained()
                    ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employes');
    }
};