<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stocks', function (Blueprint $table) {

            $table->id();

            $table->foreignId('materiel_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->enum('type', [
                'Entrée',
                'Sortie'
            ]);

            $table->integer('quantite');

            $table->date('date_mouvement');

            $table->string('reference')->nullable();

            $table->text('observation')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};