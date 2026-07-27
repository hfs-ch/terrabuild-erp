<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'categorie',
        'marque',
        'quantite',
        'etat',
        'description',
        'chantier_id',
    ];

    public function chantier()
    {
        return $this->belongsTo(Chantier::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }   
}