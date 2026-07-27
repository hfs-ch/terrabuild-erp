<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('chantiers', function (Blueprint $table) {

            if (!Schema::hasColumn('chantiers','reference')) {
                $table->string('reference')->unique()->after('id');
            }

            if (!Schema::hasColumn('chantiers','budget')) {
                $table->decimal('budget',12,2)->default(0)->after('date_fin');
            }

        });
    }

    public function down(): void
    {
        Schema::table('chantiers', function (Blueprint $table) {

            if (Schema::hasColumn('chantiers','reference')) {
                $table->dropColumn('reference');
            }

            if (Schema::hasColumn('chantiers','budget')) {
                $table->dropColumn('budget');
            }

        });
    }
};