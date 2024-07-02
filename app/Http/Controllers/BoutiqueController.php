<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produits;
use Illuminate\Http\Request;

class BoutiqueController extends Controller
{
    public function index()
    {
        $produits = Produits::all();
        $categories = Categorie::all();
        return view('Boutique.boutique', compact('produits', 'categories'));
    }
}
