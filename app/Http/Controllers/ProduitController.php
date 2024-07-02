<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Categorie;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Produits;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    public function details($id)
{
    // Récupérer le produit depuis la base de données (exemple)
    $produit = Produits::findOrFail($id);

    // Retourner la vue avec les données du produit
    return view('produits.details', compact('produit'));
}
    public function show($id)
    {
        $produit = Produits::findOrFail($id);
        $categories = Categorie::all();
        return view('details', compact('produit','categories'));
    }

    public function boutique()
    {
        $produits = Produits::all();
        $categories = Categorie::all();
        return view('Boutique.boutique', compact('produits','categories'));
    }
    public function liste_produit()
    {
        $produits = Produits::all();
        return view('Produits.listeProduit', compact('produits'));
    }

    public function ajouter_produit_traitement(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'prix' => 'required|numeric',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $user = Auth::user();
        $produit = new Produits();
        $produit->name = $request->name;
        $produit->description = $request->description;
        $produit->prix = $request->prix;
        $produit->categorie_id = $request->categorie_id;
        $produit->created_by = $user->name;
        $produit->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/images');
                $imageModel = new Image();
                $imageModel->produit_id = $produit->id;
                $imageModel->image_path = $path;
                $imageModel->save();
            }
        }

        $categories = Categorie::all();

        // Redirection avec un message de succès
        return view('dashboard', compact('categories'))->with('status', 'Le Produit a bien été ajouté avec succès.');
    }

    public function update_produit($id)
    {
        $produits = Produits::with('images')->find($id);
        $categories = Categorie::all();//cette ligne pour obtenir les catégories
        return view('Produits.update', compact('produits', 'categories'));
    }

    public function update_produit_traitement(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $produit = Produits::findOrFail($request->id);//findOrFail pour s'assurer que le produit existe
        $produit->name = $request->name;
        $produit->description = $request->description;
        $produit->prix = $request->prix;
        $produit->categorie_id = $request->categorie_id;

        $produit->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/images');
                $imageModel = new Image();
                $imageModel->produit_id = $produit->id;
                $imageModel->image_path = $path;
                $imageModel->save();
            }
        }

        return redirect('/listeProduit')->with('status', 'Le produit a bien été Modifier avec succès.');
    }

    public function delete_image($id)
    {
        $image = Image::find($id);
        Storage::delete($image->image_path);
        $image->delete();
        return back()->with('status', 'L\'image a bien été supprimée.');
    }

    public function delete_produit($id)
    {
        $produit = Produits::find($id);
        foreach ($produit->images as $image) {
            Storage::delete($image->image_path);
            $image->delete();
        }
        $produit->delete();
        return redirect('/listeProduit')->with('status', 'Le produit a bien été supprimé avec succès.');
    }
}
