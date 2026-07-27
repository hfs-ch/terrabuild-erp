<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('fournisseurs', 'nom')) {
            Schema::table('fournisseurs', function (Blueprint $table) {
                $table->string('nom')->after('id');
                $table->string('contact')->nullable()->after('nom');
                $table->string('telephone')->nullable()->after('contact');
                $table->string('email')->nullable()->after('telephone');
                $table->string('adresse')->nullable()->after('email');
                $table->string('specialite')->nullable()->after('adresse');
                $table->enum('statut', ['Actif', 'Inactif'])->default('Actif')->after('specialite');
            });
        }

        if (! Schema::hasColumn('vehicules', 'immatriculation')) {
            Schema::table('vehicules', function (Blueprint $table) {
                $table->string('immatriculation')->unique()->after('id');
                $table->string('marque')->after('immatriculation');
                $table->string('modele')->nullable()->after('marque');
                $table->string('type')->after('modele');
                $table->string('chauffeur')->nullable()->after('type');
                $table->enum('statut', ['Disponible', 'En service', 'Hors service'])->default('Disponible')->after('chauffeur');
                $table->foreignId('chantier_id')->nullable()->after('statut')->constrained()->nullOnDelete();
            });
        }

        if (! Schema::hasColumn('taches', 'titre')) {
            Schema::table('taches', function (Blueprint $table) {
                $table->foreignId('chantier_id')->nullable()->after('id')->constrained()->nullOnDelete();
                $table->foreignId('employe_id')->nullable()->after('chantier_id')->constrained()->nullOnDelete();
                $table->string('titre')->after('employe_id');
                $table->text('description')->nullable()->after('titre');
                $table->date('date_debut')->after('description');
                $table->date('date_fin')->nullable()->after('date_debut');
                $table->enum('statut', ['À faire', 'En cours', 'Terminée', 'Annulée'])->default('À faire')->after('date_fin');
                $table->enum('priorite', ['Basse', 'Moyenne', 'Haute'])->default('Moyenne')->after('statut');
            });
        }

        if (! Schema::hasColumn('presences', 'date_presence')) {
            Schema::table('presences', function (Blueprint $table) {
                $table->foreignId('employe_id')->nullable()->after('id')->constrained()->nullOnDelete();
                $table->date('date_presence')->after('employe_id');
                $table->time('heure_entree')->nullable()->after('date_presence');
                $table->time('heure_sortie')->nullable()->after('heure_entree');
                $table->enum('statut', ['Présent', 'Absent', 'Retard', 'Conge'])->default('Présent')->after('heure_sortie');
                $table->text('commentaire')->nullable()->after('statut');
            });
        }

        if (! Schema::hasColumn('salaires', 'mois')) {
            Schema::table('salaires', function (Blueprint $table) {
                $table->foreignId('employe_id')->nullable()->after('id')->constrained()->nullOnDelete();
                $table->string('mois')->after('employe_id');
                $table->decimal('base_salaire', 12, 2)->default(0)->after('mois');
                $table->decimal('prime', 12, 2)->default(0)->after('base_salaire');
                $table->decimal('deductions', 12, 2)->default(0)->after('prime');
                $table->decimal('net_a_payer', 12, 2)->default(0)->after('deductions');
                $table->enum('statut', ['Payé', 'En attente', 'Différé'])->default('En attente')->after('net_a_payer');
            });
        }

        if (! Schema::hasColumn('devis', 'reference')) {
            Schema::table('devis', function (Blueprint $table) {
                $table->foreignId('client_id')->nullable()->after('id')->constrained()->nullOnDelete();
                $table->string('reference')->unique()->after('client_id');
                $table->date('date_emission')->after('reference');
                $table->date('date_validite')->after('date_emission');
                $table->decimal('montant_ht', 12, 2)->default(0)->after('date_validite');
                $table->decimal('tva', 12, 2)->default(0)->after('montant_ht');
                $table->decimal('montant_ttc', 12, 2)->default(0)->after('tva');
                $table->enum('statut', ['Soumis', 'Accepté', 'Refusé'])->default('Soumis')->after('montant_ttc');
            });
        }

        if (! Schema::hasColumn('factures', 'reference')) {
            Schema::table('factures', function (Blueprint $table) {
                $table->foreignId('client_id')->nullable()->after('id')->constrained()->nullOnDelete();
                $table->foreignId('devis_id')->nullable()->after('client_id')->constrained()->nullOnDelete();
                $table->string('reference')->unique()->after('devis_id');
                $table->date('date_emission')->after('reference');
                $table->date('date_echeance')->after('date_emission');
                $table->decimal('montant_ht', 12, 2)->default(0)->after('date_echeance');
                $table->decimal('tva', 12, 2)->default(0)->after('montant_ht');
                $table->decimal('montant_ttc', 12, 2)->default(0)->after('tva');
                $table->enum('statut', ['Payée', 'Partiellement payée', 'Impayée'])->default('Impayée')->after('montant_ttc');
            });
        }

        if (! Schema::hasColumn('paiements', 'montant')) {
            Schema::table('paiements', function (Blueprint $table) {
                $table->foreignId('facture_id')->nullable()->after('id')->constrained()->nullOnDelete();
                $table->foreignId('client_id')->nullable()->after('facture_id')->constrained()->nullOnDelete();
                $table->decimal('montant', 12, 2)->default(0)->after('client_id');
                $table->date('date_paiement')->after('montant');
                $table->enum('mode', ['Espèces', 'Chèque', 'Virement', 'Carte'])->default('Virement')->after('date_paiement');
                $table->enum('statut', ['Reçu', 'En attente', 'Annulé'])->default('En attente')->after('mode');
            });
        }

        if (! Schema::hasColumn('documents', 'chemin')) {
            Schema::table('documents', function (Blueprint $table) {
                $table->foreignId('projet_id')->nullable()->after('id')->constrained()->nullOnDelete();
                $table->foreignId('chantier_id')->nullable()->after('projet_id')->constrained()->nullOnDelete();
                $table->enum('type', ['PDF', 'Image', 'Plan', 'Contrat'])->default('PDF')->after('chantier_id');
                $table->string('nom')->after('type');
                $table->string('chemin')->after('nom');
                $table->string('categorie')->nullable()->after('chemin');
                $table->text('description')->nullable()->after('categorie');
            });
        }
    }

    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropConstrainedForeignId('projet_id');
            $table->dropConstrainedForeignId('chantier_id');
            $table->dropColumn(['type', 'nom', 'chemin', 'categorie', 'description']);
        });

        Schema::table('paiements', function (Blueprint $table) {
            $table->dropConstrainedForeignId('facture_id');
            $table->dropConstrainedForeignId('client_id');
            $table->dropColumn(['montant', 'date_paiement', 'mode', 'statut']);
        });

        Schema::table('factures', function (Blueprint $table) {
            $table->dropConstrainedForeignId('client_id');
            $table->dropConstrainedForeignId('devis_id');
            $table->dropColumn(['reference', 'date_emission', 'date_echeance', 'montant_ht', 'tva', 'montant_ttc', 'statut']);
        });

        Schema::table('devis', function (Blueprint $table) {
            $table->dropConstrainedForeignId('client_id');
            $table->dropColumn(['reference', 'date_emission', 'date_validite', 'montant_ht', 'tva', 'montant_ttc', 'statut']);
        });

        Schema::table('salaires', function (Blueprint $table) {
            $table->dropConstrainedForeignId('employe_id');
            $table->dropColumn(['mois', 'base_salaire', 'prime', 'deductions', 'net_a_payer', 'statut']);
        });

        Schema::table('presences', function (Blueprint $table) {
            $table->dropConstrainedForeignId('employe_id');
            $table->dropColumn(['date_presence', 'heure_entree', 'heure_sortie', 'statut', 'commentaire']);
        });

        Schema::table('taches', function (Blueprint $table) {
            $table->dropConstrainedForeignId('chantier_id');
            $table->dropConstrainedForeignId('employe_id');
            $table->dropColumn(['titre', 'description', 'date_debut', 'date_fin', 'statut', 'priorite']);
        });

        Schema::table('vehicules', function (Blueprint $table) {
            $table->dropConstrainedForeignId('chantier_id');
            $table->dropColumn(['immatriculation', 'marque', 'modele', 'type', 'chauffeur', 'statut']);
        });

        Schema::table('fournisseurs', function (Blueprint $table) {
            $table->dropColumn(['nom', 'contact', 'telephone', 'email', 'adresse', 'specialite', 'statut']);
        });
    }
};
