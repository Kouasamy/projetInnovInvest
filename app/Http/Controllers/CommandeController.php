<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function create()
    {
        return view('commandes.commande');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'ville' => 'required|string|max:255',
            'commune' => 'required|string|max:255',
            'livraison' => 'required|string|max:255',


        ]);

        Commande::create([
            'name' => $request->name,
            'telephone' => $request->telephone,
            'ville' => $request->ville,
            'commune' => $request->commune,
            'livraison' => $request->livraison,
            'user_id' => auth()->id(), // Voir si il est authentifier
        ]);

        return redirect()->route('commande.create')->with('success', 'Commande passée avec succès!');
    }
    public function index()
    {
        $commandes = Commande::where('user_id', auth()->id())->get();
        return view('commandes.listesCommande', compact('commandes'));
    }
}
