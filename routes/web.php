<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AproposController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/contact', function () {
    return view('contact.contact');
})->name('contact');
Route::get('/apropos', [AproposController::class, 'apropos'])->name('apropos');


Route::get('/boutique', [ProduitController::class, 'boutique'])->name('boutique');
Route::get('/panier', [PanierController::class, 'panier'])->name('panier');
Route::post('/panier/ajouter', [PanierController::class, 'ajouter'])->name('panier.ajouter');
Route::delete('/panier/supprimer/{id}', [PanierController::class, 'supprimer'])->name('panier.supprimer');


//Route commandes :



Route::get('/produit/{id}', [ProduitController::class, 'show'])->name('produit.details');

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Route catégories
Route::get('/categorie', [CategorieController::class, 'categorie']);
Route::post('/ajouterCategorie/traitement', [CategorieController::class, 'ajouter_categorie_traitement']);
Route::get('/listeCategorie', [CategorieController::class, 'liste_categorie'])->name('listeCategorie');
Route::get('/updateCategorie-categorie/{id}', [CategorieController::class, 'update_categorie']);
Route::post('/updateCategorie/traitement', [CategorieController::class, 'update_categorie_traitement']);
Route::get('/delete-categorie/{id}', [CategorieController::class, 'delete_categorie']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Route du panier
    Route::get('/panier', [PanierController::class, 'panier'])->name('panier');
    Route::post('/panier/ajouter', [PanierController::class, 'ajouter'])->name('panier.ajouter');
    Route::delete('/panier/supprimer/{id}', [PanierController::class, 'supprimer'])->name('panier.supprimer');
    //Route des commandes
    Route::get('/commandes', [CommandeController::class, 'index'])->name('commandes.index');
    Route::get('/commande', [CommandeController::class, 'create'])->name('commande.create');
    Route::post('/commande', [CommandeController::class, 'store'])->name('commande.store');

    // Middleware commun pour admin et super admin
    Route::get('/dashboard', function () {
        $categories = App\Models\Categorie::all();
        return view('dashboard', compact('categories'));
    })->name('dashboard')->middleware('role:admin,super admin');

    // Routes pour admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/dashboard', function () {
            $categories = App\Models\Categorie::all();
            return view('dashboard', compact('categories'));
        })->name('dashboard')->middleware('role:admin,super admin');
        Route::post('/ajouterProduit/traitement', [ProduitController::class, 'ajouter_produit_traitement']);
        Route::get('/listeProduit', [ProduitController::class, 'liste_produit'])->name('listeProduit');
        Route::get('/update-produit/{id}', [ProduitController::class, 'update_produit']);
        Route::post('/update/traitement', [ProduitController::class, 'update_produit_traitement']);
        Route::get('/delete-produit/{id}', [ProduitController::class, 'delete_produit']);
        Route::get('/delete-image/{id}', [ProduitController::class, 'delete_image']);

        Route::get('/categorie', [CategorieController::class, 'categorie']);
        Route::post('/ajouterCategorie/traitement', [CategorieController::class, 'ajouter_categorie_traitement']);
        Route::get('/listeCategorie', [CategorieController::class, 'liste_categorie'])->name('listeCategorie');
        Route::get('/updateCategorie-categorie/{id}', [CategorieController::class, 'update_categorie']);
        Route::post('/updateCategorie/traitement', [CategorieController::class, 'update_categorie_traitement']);
        Route::get('/delete-categorie/{id}', [CategorieController::class, 'delete_categorie']);
    });

    // Routes pour super admin
    Route::middleware(['role:super admin'])->group(function () {
        Route::post('/ajouterProduit/traitement', [ProduitController::class, 'ajouter_produit_traitement']);
        Route::get('/listeProduit', [ProduitController::class, 'liste_produit'])->name('listeProduit');
        Route::get('/update-produit/{id}', [ProduitController::class, 'update_produit']);
        Route::post('/update/traitement', [ProduitController::class, 'update_produit_traitement']);
        Route::get('/delete-produit/{id}', [ProduitController::class, 'delete_produit']);
        Route::get('/delete-image/{id}', [ProduitController::class, 'delete_image']);

        Route::get('/dashboard', function () {
            $categories = App\Models\Categorie::all();
            return view('dashboard', compact('categories'));
        })->name('dashboard')->middleware('role:admin,super admin');

        // Administrateurs
        Route::get('/admin', [AdminController::class, 'admin']);
        Route::post('/ajouterAdmin/traitement', [AdminController::class, 'ajouter_admin_traitement']);
        Route::get('/listeAdmin', [AdminController::class, 'liste_admin'])->name('listeAdmin');
        Route::get('/updateAdmin-admin/{id}', [AdminController::class, 'update_admin']);
        Route::post('/updateAdmin/traitement', [AdminController::class, 'update_admin_traitement']);
        Route::get('/delete-admin/{id}', [AdminController::class, 'delete_admin']);

        // Route catégories
        Route::get('/categorie', [CategorieController::class, 'categorie']);
        Route::post('/ajouterCategorie/traitement', [CategorieController::class, 'ajouter_categorie_traitement']);
        Route::get('/listeCategorie', [CategorieController::class, 'liste_categorie'])->name('listeCategorie');
        Route::get('/updateCategorie-categorie/{id}', [CategorieController::class, 'update_categorie']);
        Route::post('/updateCategorie/traitement', [CategorieController::class, 'update_categorie_traitement']);
        Route::get('/delete-categorie/{id}', [CategorieController::class, 'delete_categorie']);
    });
});

require __DIR__ . '/auth.php';
