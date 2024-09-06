<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LigneApprovisionement extends Model
{
    use HasFactory;
    protected $fillable = [
        'qte_acheter',
        'date_livraison',
        'prod_id',
        'apprivisionement_id',
    ];

    public function approvisionement(): BelongsTo
    {
        return $this->belongsTo(Approvisionement::class);
    }

    public function produit(): BelongsTo
    {
        return $this->belongsTo(Produit::class);
    }
}
