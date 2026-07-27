<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // clients
        if (!Schema::hasColumn('clients', 'ville')) {
            Schema::table('clients', function (Blueprint $table) {
                $table->string('ville')->nullable()->after('adresse');
            });
        }

        // materiels
        if (!Schema::hasColumn('materiels', 'prix_unitaire')) {
            Schema::table('materiels', function (Blueprint $table) {
                $table->decimal('prix_unitaire',10,2)->default(0)->after('description');
            });
        }

        // fournisseurs
        if (!Schema::hasColumn('fournisseurs', 'statut')) {
            Schema::table('fournisseurs', function (Blueprint $table) {
                $table->enum('statut',['Actif','Inactif'])
                      ->default('Actif');
            });
        }

        // factures
        if (!Schema::hasColumn('factures', 'sous_total')) {
            Schema::table('factures', function (Blueprint $table) {
                $table->decimal('sous_total',12,2)->default(0);
                $table->decimal('montant_tva',12,2)->default(0);
                $table->decimal('remise',12,2)->default(0);
            });
        }
    }


    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            if (Schema::hasColumn('clients','ville')) {
                $table->dropColumn('ville');
            }
        });
    }
};
