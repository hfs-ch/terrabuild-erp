<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('facture_lignes', function (Blueprint $table) {

            $table->id();

            $table->foreignId('facture_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('designation');

            $table->integer('quantite')->default(1);

            $table->decimal('prix_unitaire',12,2);

            $table->decimal('tva',5,2)->default(20);

            $table->decimal('total_ht',12,2);

            $table->decimal('total_ttc',12,2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('facture_lignes');
    }
};