<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ApprovisionementController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('produits', ProduitController::class);
Route::resource('commandes', CommandeController::class);
Route::resource('personnes', PersonneController::class);
Route::resource('fournisseurs', FournisseurController::class);
Route::resource('approvisionements', ApprovisionementController::class);



//Route::get("/commandes/{commande}/facture",[CommandeController::class,'generer_facture'])->name('generer_facture');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
