<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    protected $fillable = [
        'chantier_id',
        'employe_id',
        'titre',
        'description',
        'date_debut',
        'date_fin',
        'statut',
        'priorite',
    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
    ];

    public function chantier()
    {
        return $this->belongsTo(Chantier::class);
    }

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
