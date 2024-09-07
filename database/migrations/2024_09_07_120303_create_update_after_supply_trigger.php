<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class update_after_supply_trigger extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       DB::statement("CREATE TRIGGER update_after_supply_trigger AFTER INSERT ON 'approvisionemts' FOR EACH ROW
        BEGIN
            DECLARE qte_achat;
            update 'produits' set qte_stock=qte_stock+qte_achat where id=NEW.id;
        END;

        ")
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('update_after_supply_trigger');
    }
};
