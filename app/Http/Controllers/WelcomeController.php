<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories = Categorie::all(); // Récupérez toutes les catégories depuis le modèle Categorie

        return view('welcome', compact('categories')); // Passez les catégories à la vue
    }
}
