<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fournisseurs', function (Blueprint $table) {
            $table->string('nom')->after('id')->nullable();
            $table->string('contact')->after('nom')->nullable();
            $table->string('telephone')->after('contact')->nullable();
            $table->string('email')->after('telephone')->nullable();
            $table->string('adresse')->after('email')->nullable();
            $table->string('specialite')->after('adresse')->nullable();
            $table->string('statut')->after('specialite')->default('Actif');
        });
    }

    public function down(): void
    {
        Schema::table('fournisseurs', function (Blueprint $table) {
            $table->dropColumn([
                'nom',
                'contact',
                'telephone',
                'email',
                'adresse',
                'specialite',
                'statut',
            ]);
        });
    }
};
