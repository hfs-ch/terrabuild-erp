<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'materiel_id',
        'type',
        'quantite',
        'date_mouvement',
        'reference',
        'observation',
    ];

    public function materiel()
    {
        return $this->belongsTo(Materiel::class);
    }
}