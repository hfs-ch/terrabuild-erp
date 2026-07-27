<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_id',
        'mois',
        'base_salaire',
        'prime',
        'deductions',
        'net_a_payer',
        'statut',
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
