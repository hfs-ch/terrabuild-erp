<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('factures', 'reference')) {
            Schema::table('factures', function (Blueprint $table) {
                $table->foreignId('client_id')->nullable()->constrained()->nullOnDelete();
                $table->foreignId('devis_id')->nullable()->constrained()->nullOnDelete();
                $table->string('reference')->nullable();
                $table->date('date_emission')->nullable();
                $table->date('date_echeance')->nullable();
                $table->decimal('montant_ht', 12, 2)->default(0);
                $table->decimal('tva', 12, 2)->default(0);
                $table->decimal('montant_ttc', 12, 2)->default(0);
                $table->string('statut')->default('En attente');
            });
        }
    }

    public function down(): void
    {
        Schema::table('factures', function (Blueprint $table) {
            $table->dropForeign(['client_id']);
            $table->dropForeign(['devis_id']);
            $table->dropColumn([
                'client_id',
                'devis_id',
                'reference',
                'date_emission',
                'date_echeance',
                'montant_ht',
                'tva',
                'montant_ttc',
                'statut',
            ]);
        });
    }
};
