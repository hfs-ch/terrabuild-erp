<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('clients', 'ville')) {
            Schema::table('clients', function (Blueprint $table) {
                $table->string('ville')->nullable()->after('adresse');
            });
        }

        if (!Schema::hasColumn('chantiers', 'reference')) {
            Schema::table('chantiers', function (Blueprint $table) {
                $table->string('reference')->unique()->after('id');
            });
        }

        if (!Schema::hasColumn('chantiers', 'budget')) {
            Schema::table('chantiers', function (Blueprint $table) {
                $table->decimal('budget', 12, 2)->default(0)->after('date_fin');
            });
        }

        if (!Schema::hasColumn('materiels', 'prix_unitaire')) {
            Schema::table('materiels', function (Blueprint $table) {
                $table->decimal('prix_unitaire', 10, 2)->default(0);
            });
        }
    }

    public function down(): void
    {
        //
    }
};