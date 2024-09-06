<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Approvisionement extends Model
{
    use HasFactory;

    protected $fillable = [
        'prix_achat_unitaire',
        'gerant_id',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'gerant_id');
    }

    public function fournisseur(): BelongsTo
    {
        return $this->belongsTo(Fournisseur::class);
    }

    public function lignesapprovisionements(): HasMany {

        return $this->hasMany(LigneApprovisionement::class);

    }
}
