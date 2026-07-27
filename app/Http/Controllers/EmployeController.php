<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeRequest;
use App\Http\Requests\UpdateEmployeRequest;
use App\Models\Employe;

class EmployeController extends Controller
{
    public function index()
    {
        $employes = Employe::orderBy('id', 'desc')->paginate(10);

        return view('employes.index', compact('employes'));
    }

    public function create()
    {
        return view('employes.create');
    }

    public function store(StoreEmployeRequest $request)
    {
        Employe::create($request->validated());

        return redirect()
            ->route('employes.index')
            ->with('success', 'Employé ajouté avec succès.');
    }

    public function show(Employe $employe)
    {
        return view('employes.show', compact('employe'));
    }

    public function edit(Employe $employe)
    {
        return view('employes.edit', compact('employe'));
    }

    public function update(UpdateEmployeRequest $request, Employe $employe)
    {
        $employe->update($request->validated());

        return redirect()
            ->route('employes.index')
            ->with('success', 'Employé modifié avec succès.');
    }

    public function destroy(Employe $employe)
    {
        $employe->delete();

        return redirect()
            ->route('employes.index')
            ->with('success', 'Employé supprimé avec succès.');
    }
}