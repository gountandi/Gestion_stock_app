<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //roles
        $roleGerant=Role::create(['name'=>'gerant']);
        $roleVendeur=Role::create(['name'=>'vendeur']);

        //permissions
        Permission::create(['name'=>'Enregistrer une commande']);
        Permission::create(['name'=>'Enregistrer un client']);
        Permission::create(['name'=>'Enregistrer un fournisseur']);
        Permission::create(['name'=>'Ajouter une categorie']);
        Permission::create(['name'=>'Ajouter Produits']);
        Permission::create(['name'=>'Approvissioner']);

        //assigner les permissions aux roles
        $roleGerant->givePermissionTo('Enregistrer une commande');
        $roleGerant->givePermissionTo('Enregistrer un fournisseur');
        $roleGerant->givePermissionTo('Enregistrer un client');
        $roleGerant->givePermissionTo('Ajouter une categorie');
        $roleGerant->givePermissionTo('Ajouter Produits');
        $roleGerant->givePermissionTo('Approvissioner');

        $roleVendeur->givePermissionTo('Enregistrer une commande');
        $roleVendeur->givePermissionTo('Enregistrer un client');



    }
}
