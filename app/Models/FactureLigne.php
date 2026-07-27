<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureLigne extends Model
{
    use HasFactory;

    protected $fillable = [
        'facture_id',
        'designation',
        'quantite',
        'prix_unitaire',
        'tva',
        'total_ht',
        'total_ttc',
    ];

    public function facture()
    {
        return $this->belongsTo(Facture::class);
    }
}