<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('paiements', 'montant')) {
            Schema::table('paiements', function (Blueprint $table) {
                $table->foreignId('facture_id')->nullable()->constrained()->nullOnDelete();
                $table->foreignId('client_id')->nullable()->constrained()->nullOnDelete();
                $table->decimal('montant', 12, 2)->default(0);
                $table->date('date_paiement')->nullable();
                $table->string('mode')->default('Virement');
                $table->string('statut')->default('Reçu');
            });
        }
    }

    public function down(): void
    {
        Schema::table('paiements', function (Blueprint $table) {
            $table->dropForeign(['facture_id']);
            $table->dropForeign(['client_id']);
            $table->dropColumn([
                'facture_id',
                'client_id',
                'montant',
                'date_paiement',
                'mode',
                'statut',
            ]);
        });
    }
};
