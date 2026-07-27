<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'matricule' => 'required|unique:employes,matricule',

            'nom' => 'required|string|max:255',

            'prenom' => 'required|string|max:255',

            'date_naissance' => 'nullable|date',

            'sexe' => 'required|in:Homme,Femme',

            'telephone' => 'required|string|max:20',

            'email' => 'nullable|email',

            'adresse' => 'nullable|string',

            'date_embauche' => 'required|date',

            'poste' => 'required|string|max:255',

            'salaire' => 'required|numeric|min:0',

            'statut' => 'required|in:Actif,Suspendu,Congé',

            'user_id' => 'nullable|exists:users,id',

        ];
    }
}