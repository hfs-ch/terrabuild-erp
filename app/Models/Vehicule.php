<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;

    protected $fillable = [
        'immatriculation',
        'marque',
        'modele',
        'type',
        'chauffeur',
        'statut',
        'chantier_id',
    ];

    public function chantier()
    {
        return $this->belongsTo(Chantier::class);
    }
}
