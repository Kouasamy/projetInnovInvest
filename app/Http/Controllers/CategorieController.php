<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function categorie()
    {
        return view('Categorie.categorie');
    }
    public function liste_categorie(){
        $categories = Categorie::all();
        return view('Categorie.listeCategorie', compact('categories'));
    }
    public function ajouter_categorie_traitement(Request $request){
        $request->validate([
            'nomCategorie' => 'required',
        ]);
        $categorie = new Categorie();
        $categorie->nomCategorie = $request->nomCategorie;
        $categorie->save();

        return redirect('/categorie')->with('status', "La categorie a bien été ajouté avec succès.");
    }
    public function update_categorie($id)
    {
        $categories = Categorie::find($id);
        return view('Categorie.updateCategorie', compact('categories'));
    }
    public function update_categorie_traitement(Request $request)
{
    $request->validate([
        'nomCategorie' => 'required',
    ]);

    // Récupérez l'ID de la catégorie à partir de la requête
    $categorie = Categorie::find($request->id);
    if (!$categorie) {
        return redirect()->route('categorie.index')->with('status', "La catégorie n'a pas été trouvée.");
    }

    $categorie->nomCategorie = $request->nomCategorie;
    $categorie->save(); // Utilisez save() au lieu de update()

    return redirect()->route('listeCategorie')->with('status', "La catégorie a bien été modifiée avec succès.");
}
    public function delete_categorie($id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();
        return redirect('/listeCategorie')->with('status', "La categorie a bien été supprimé avec succès.");
    }

}
