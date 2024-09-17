<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Approvisionnement;
use App\Models\LigneApprovisionement;
use App\Models\User;
use Faker\Factory as Faker;
class ApprovisionnementsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            DB::table('approvisionements')->insert([
                'gerant_id'=>$faker->numberBetween(1, 100),
                'fournisseur_id' => $faker->numberBetween(1, 100),  // Référence à un fournisseur existant
                'prix_achat_unitaire' => $faker->randomFloat(2, 10, 100),
                'date_livraison' => $faker->date(),
            ]);
        }
    }
}
