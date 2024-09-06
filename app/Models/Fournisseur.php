<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fournisseur extends Model
{
    use HasFactory;

    public function personne(): HasOne
    {
        return $this->hasOne(Personne::class);
    }
    public function approvisionements(): HasMany {

        return $this->hasMany(Approvisionement::class, "fournisseur_id");

    }
}