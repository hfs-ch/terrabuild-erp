<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('factures', function (Blueprint $table) {

            $table->decimal('sous_total',12,2)->default(0);
            $table->decimal('montant_tva',12,2)->default(0);
            $table->decimal('remise',12,2)->default(0);

        });
    }

    public function down(): void
    {
        Schema::table('factures', function (Blueprint $table) {

            $table->dropColumn([
                'sous_total',
                'montant_tva',
                'remise'
            ]);

        });
    }
};