<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'projet_id',
        'chantier_id',
        'type',
        'nom',
        'chemin',
        'categorie',
        'description',
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function chantier()
    {
        return $this->belongsTo(Chantier::class);
    }
}
