<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LigneApprovisionementTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            DB::table('lignes_approvisionements')->insert([
                'qte_approvisionner' => $faker->numberBetween(10, 500),
                'prod_id' => $faker->numberBetween(1, 100),   // Référence à un produit existant
                'apprivisionement_id' => $faker->numberBetween(1, 100), // Référence à un approvisionnement existant
            ]);
        }
    }
}
