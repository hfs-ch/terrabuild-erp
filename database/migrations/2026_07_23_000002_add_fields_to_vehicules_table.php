<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('vehicules', 'immatriculation')) {
            Schema::table('vehicules', function (Blueprint $table) {
                $table->string('immatriculation')->after('id')->nullable();
                $table->string('marque')->after('immatriculation')->nullable();
                $table->string('modele')->after('marque')->nullable();
                $table->string('type')->after('modele')->nullable();
                $table->string('chauffeur')->after('type')->nullable();
                $table->string('statut')->after('chauffeur')->default('Disponible');
                $table->foreignId('chantier_id')->after('statut')->nullable()->constrained()->nullOnDelete();
            });
        }
    }

    public function down(): void
    {
        Schema::table('vehicules', function (Blueprint $table) {
            $table->dropForeign(['chantier_id']);
            $table->dropColumn([
                'immatriculation',
                'marque',
                'modele',
                'type',
                'chauffeur',
                'statut',
                'chantier_id',
            ]);
        });
    }
};
