<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view dashboard',
            'view employes',
            'create employes',
            'update employes',
            'delete employes',
            'view clients',
            'create clients',
            'update clients',
            'delete clients',
            'view projets',
            'create projets',
            'update projets',
            'delete projets',
            'view chantiers',
            'create chantiers',
            'update chantiers',
            'delete chantiers',
            'view equipes',
            'create equipes',
            'update equipes',
            'delete equipes',
            'view materiels',
            'create materiels',
            'update materiels',
            'delete materiels',
            'view stocks',
            'create stocks',
            'update stocks',
            'delete stocks',
            'view fournisseurs',
            'create fournisseurs',
            'update fournisseurs',
            'delete fournisseurs',
            'view vehicules',
            'create vehicules',
            'update vehicules',
            'delete vehicules',
            'view taches',
            'create taches',
            'update taches',
            'delete taches',
            'view presences',
            'create presences',
            'update presences',
            'delete presences',
            'view salaires',
            'create salaires',
            'update salaires',
            'delete salaires',
            'view devis',
            'create devis',
            'update devis',
            'delete devis',
            'view factures',
            'create factures',
            'update factures',
            'delete factures',
            'view paiements',
            'create paiements',
            'update paiements',
            'delete paiements',
            'view documents',
            'create documents',
            'update documents',
            'delete documents',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        $allPermissions = Permission::all();

        $admin = Role::firstOrCreate(['name' => 'Administrateur', 'guard_name' => 'web']);
        $directeur = Role::firstOrCreate(['name' => 'Directeur', 'guard_name' => 'web']);
        $chefChantier = Role::firstOrCreate(['name' => 'Chef de chantier', 'guard_name' => 'web']);
        $rh = Role::firstOrCreate(['name' => 'RH', 'guard_name' => 'web']);
        $comptable = Role::firstOrCreate(['name' => 'Comptable', 'guard_name' => 'web']);
        $magasinier = Role::firstOrCreate(['name' => 'Magasinier', 'guard_name' => 'web']);
        $employe = Role::firstOrCreate(['name' => 'Employé', 'guard_name' => 'web']);

        $admin->syncPermissions($allPermissions);

        $directeur->syncPermissions($allPermissions);

        $chefChantier->syncPermissions([
            'view dashboard',
            'view projets',
            'create projets',
            'update projets',
            'view chantiers',
            'create chantiers',
            'update chantiers',
            'view equipes',
            'create equipes',
            'update equipes',
            'view taches',
            'create taches',
            'update taches',
            'view presences',
            'create presences',
            'update presences',
            'view documents',
            'create documents',
            'update documents',
        ]);

        $rh->syncPermissions([
            'view dashboard',
            'view employes',
            'create employes',
            'update employes',
            'view presences',
            'create presences',
            'update presences',
            'view salaires',
            'create salaires',
            'update salaires',
        ]);

        $comptable->syncPermissions([
            'view dashboard',
            'view devis',
            'create devis',
            'update devis',
            'view factures',
            'create factures',
            'update factures',
            'view paiements',
            'create paiements',
            'update paiements',
            'view salaires',
            'create salaires',
            'update salaires',
        ]);

        $magasinier->syncPermissions([
            'view dashboard',
            'view materiels',
            'create materiels',
            'update materiels',
            'view stocks',
            'create stocks',
            'update stocks',
            'view fournisseurs',
            'create fournisseurs',
            'update fournisseurs',
            'view vehicules',
            'create vehicules',
            'update vehicules',
        ]);

        $employe->syncPermissions([
            'view dashboard',
            'view documents',
            'view presences',
        ]);
    }
}
