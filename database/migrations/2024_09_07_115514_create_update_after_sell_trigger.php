<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class update_after_sell_trigger extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE TRIGGER update_after_sell_trigger AFTER INSERT ON 'commandes' for each row
        BEGIN
            DECLARE qte_vente;
            update 'produits' set qte_stock=qte_stock-qte_vente where id=NEW.id;
        END;

        ");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('update_after_sell_trigger');
    }
};
