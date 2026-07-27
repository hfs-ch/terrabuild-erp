<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('employes', function (Blueprint $table) {

        $table->foreignId('equipe_id')
              ->nullable()
              ->after('user_id')
              ->constrained()
              ->nullOnDelete();

    });
}

public function down(): void
{
    Schema::table('employes', function (Blueprint $table) {

        $table->dropForeign(['equipe_id']);
        $table->dropColumn('equipe_id');

    });
}
};
