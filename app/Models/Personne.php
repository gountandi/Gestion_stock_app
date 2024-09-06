<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Personne extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'date_naiss',
        'tel',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function founisseur(): BelongsTo
    {
        return $this->belongsTo(Founisseur::class);
    }
}
