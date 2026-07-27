<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ChantierController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\SalaireController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\DocumentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Page d'accueil
Route::redirect('/', '/login');

/*
|--------------------------------------------------------------------------
| Routes protégées (authentification requise)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Modules ERP

   Route::resource('employes', EmployeController::class)
    ->parameters(['employes' => 'employe']);

Route::resource('clients', ClientController::class)
    ->parameters(['clients' => 'client']);

Route::resource('projets', ProjetController::class)
    ->parameters(['projets' => 'projet']);

Route::resource('chantiers', ChantierController::class)
    ->parameters(['chantiers' => 'chantier']);

Route::resource('equipes', EquipeController::class)
    ->parameters(['equipes' => 'equipe']);

Route::resource('materiels', MaterielController::class)
    ->parameters(['materiels' => 'materiel']);

Route::resource('stocks', StockController::class)
    ->parameters(['stocks' => 'stock']);

Route::resource('fournisseurs', FournisseurController::class)
    ->parameters(['fournisseurs' => 'fournisseur']);

Route::resource('vehicules', VehiculeController::class)
    ->parameters(['vehicules' => 'vehicule']);

Route::resource('taches', TacheController::class)
    ->parameters(['taches' => 'tache']);

Route::resource('presences', PresenceController::class)
    ->parameters(['presences' => 'presence']);

Route::resource('salaires', SalaireController::class)
    ->parameters(['salaires' => 'salaire']);

Route::resource('devis', DevisController::class)
    ->parameters(['devis' => 'devis']);

Route::resource('factures', FactureController::class)
    ->parameters(['factures' => 'facture']);

Route::resource('paiements', PaiementController::class)
    ->parameters(['paiements' => 'paiement']);

Route::get(
    'documents/{document}/download',
    [DocumentController::class, 'download']
)->name('documents.download');


    Route::get('/factures/{facture}/print',
    [FactureController::class,'print'])
    ->name('factures.print');
});
Route::post('/equipes/{equipe}/add-member',
    [EquipeController::class,'addMember'])
    ->name('equipes.addMember');



/*
|--------------------------------------------------------------------------
| Auth Routes (Laravel Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';