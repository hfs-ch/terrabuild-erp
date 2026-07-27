<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'chef_equipe',
        'description',
        'chantier_id',
    ];

    public function chantier()
    {
        return $this->belongsTo(Chantier::class);
    }

    public function employes()
    {
        return $this->hasMany(Employe::class);
    }
}