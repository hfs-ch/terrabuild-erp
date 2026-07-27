<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_id',
        'date_presence',
        'heure_entree',
        'heure_sortie',
        'statut',
        'commentaire',
    ];

    protected $casts = [
        'date_presence' => 'date',
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
