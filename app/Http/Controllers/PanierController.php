<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Produits;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    public function ajouter(Request $request)
    {
        $user = Auth::user();

        $panier = Panier::updateOrCreate(
            ['user_id' => $user->id, 'produit_id' => $request->id],
            ['qty' => 1, 'price' => $request->price]
        );

        return redirect()->route('panier');
    }

    public function panier()
    {
        $user = Auth::user();
        $panierItems = Panier::where('user_id', $user->id)->get();
          // Calculer le total
          $total = $panierItems->sum(function ($item) {
            return $item->qty * $item->price;
        });
        return view('panier', compact('panierItems', 'total'));
    }

    public function supprimer($id)
    {
        $user = Auth::user();
        Panier::where('user_id', $user->id)->where('produit_id', $id)->delete();
        return redirect()->route('panier')->with('success', 'Produit supprimé du panier avec succès.');
    }

}
