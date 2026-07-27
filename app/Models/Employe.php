<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'date_naissance',
        'sexe',
        'telephone',
        'email',
        'adresse',
        'date_embauche',
        'poste',
        'salaire',
        'statut',
        'user_id'
    ];

    protected $casts = [
        'date_naissance' => 'date',
        'date_embauche' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function equipe()
{
    return $this->belongsTo(Equipe::class);
}
public function show(Equipe $equipe)
{
    $employes = Employe::whereNull('equipe_id')
                    ->orWhere('equipe_id', $equipe->id)
                    ->get();

    return view('equipes.show', compact('equipe','employes'));
}
public function addMember(Request $request, Equipe $equipe)
{
    $request->validate([
        'employe_id'=>'required|exists:employes,id'
    ]);

    Employe::where('id',$request->employe_id)
            ->update([
                'equipe_id'=>$equipe->id
            ]);

    return back()->with('success','Employé ajouté.');
}
}