<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'libelle',
        'prix_unitaire',
        'qte_stock',
        'marque',
        'categorie',
    ];

    public function lignescomandes(): HasMany {

        return $this->hasMany(LigneCommande::class);

    }

    public function lignesapprovisionements(): HasMany {

        return $this->hasMany(LigneApprovisionement::class);

    }
}
