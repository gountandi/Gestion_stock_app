<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ApprovisionementController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('produits', ProduitController::class);
Route::resource('commandes', CommandeController::class);
Route::resource('clients', ClientController::class);
Route::resource('categories', CategorieController::class);
Route::resource('fournisseurs', FournisseurController::class);
Route::resource('approvisionements', ApprovisionementController::class);



Route::get("/commandes/{commande}/facture",[CommandeController::class,'generer_facture'])->name('generer_facture');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/roles', [RoleController::class, 'index']);
    // Other routes
});

