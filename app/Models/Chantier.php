<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chantier extends Model
{
    protected $fillable = [
        'reference',
        'nom',
        'adresse',
        'date_debut',
        'date_fin',
        'budget',
        'statut',
        'projet_id',
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
    public function equipes()
{
    return $this->hasMany(Equipe::class);
}

    public function materiels()
    {
        return $this->hasMany(Materiel::class);
    }
}