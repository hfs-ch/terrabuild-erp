<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('presences', 'date_presence')) {
            Schema::table('presences', function (Blueprint $table) {
                $table->foreignId('employe_id')->nullable()->constrained()->nullOnDelete();
                $table->date('date_presence')->nullable();
                $table->time('heure_entree')->nullable();
                $table->time('heure_sortie')->nullable();
                $table->string('statut')->default('Présent');
                $table->text('commentaire')->nullable();
            });
        }
    }

    public function down(): void
    {
        Schema::table('presences', function (Blueprint $table) {
            $table->dropForeign(['employe_id']);
            $table->dropColumn([
                'employe_id',
                'date_presence',
                'heure_entree',
                'heure_sortie',
                'statut',
                'commentaire',
            ]);
        });
    }
};
