<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('salaires', 'mois')) {
            Schema::table('salaires', function (Blueprint $table) {
                $table->foreignId('employe_id')->nullable()->constrained()->nullOnDelete();
                $table->string('mois')->nullable();
                $table->decimal('base_salaire', 12, 2)->default(0);
                $table->decimal('prime', 12, 2)->default(0);
                $table->decimal('deductions', 12, 2)->default(0);
                $table->decimal('net_a_payer', 12, 2)->default(0);
                $table->string('statut')->default('En attente');
            });
        }
    }

    public function down(): void
    {
        Schema::table('salaires', function (Blueprint $table) {
            $table->dropForeign(['employe_id']);
            $table->dropColumn([
                'employe_id',
                'mois',
                'base_salaire',
                'prime',
                'deductions',
                'net_a_payer',
                'statut',
            ]);
        });
    }
};
