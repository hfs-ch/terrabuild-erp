<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('taches', 'titre')) {
            Schema::table('taches', function (Blueprint $table) {
                $table->foreignId('chantier_id')->nullable()->constrained()->nullOnDelete();
                $table->foreignId('employe_id')->nullable()->constrained()->nullOnDelete();
                $table->string('titre')->nullable();
                $table->text('description')->nullable();
                $table->date('date_debut')->nullable();
                $table->date('date_fin')->nullable();
                $table->string('statut')->default('À faire');
                $table->string('priorite')->default('Moyenne');
            });
        }
    }

    public function down(): void
    {
        Schema::table('taches', function (Blueprint $table) {
            $table->dropForeign(['chantier_id']);
            $table->dropForeign(['employe_id']);
            $table->dropColumn([
                'chantier_id',
                'employe_id',
                'titre',
                'description',
                'date_debut',
                'date_fin',
                'statut',
                'priorite',
            ]);
        });
    }
};
