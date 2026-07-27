<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    use HasFactory;

    protected $fillable = [
    'client_id',
    'projet_id',
    'reference',
    'date_emission',
    'date_validite',
    'montant_ht',
    'tva',
    'montant_ttc',
    'statut',
];
    protected $casts = [
        'date_emission' => 'date',
        'date_validite' => 'date',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function factures()
    {
        return $this->hasMany(Facture::class);
    }

    public function projet()
{
    return $this->belongsTo(Projet::class);
}
}
