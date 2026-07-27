<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = [

        'reference',
        'nom',
        'description',
        'client_id',
        'date_debut',
        'date_fin',
        'budget',
        'statut'

    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function chantiers()
{
    return $this->hasMany(Chantier::class);
}
}