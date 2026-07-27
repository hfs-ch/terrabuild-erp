<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'devis_id',
        'reference',
        'date_emission',
        'date_echeance',
        'sous_total',
        'montant_ht',
        'montant_tva',
        'remise',
        'montant_ttc',
        'statut',
    ];

    protected $casts = [
        'date_emission' => 'date',
        'date_echeance' => 'date',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function devis()
    {
        return $this->belongsTo(Devis::class);
    }

    public function lignes()
    {
        return $this->hasMany(FactureLigne::class);
    }
}