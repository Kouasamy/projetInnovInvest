<?php

namespace App\Http\Controllers;

use App\Models\Administrateur;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;


class AdminController extends Controller
{
    public function admin()
    {
        return view('Administrateurs.admin');
    }
    public function liste_admin()
    {
        $admins = Administrateur::all();
        return view('Administrateurs.listeAdmin', compact('admins'));
    }
    public function ajouter_admin_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required',
            'motdepasse' => 'required'
        ]);
        $admin = new Administrateur();
        $admin->nom = $request->nom;
        $admin->email = $request->email;
        $admin->motdepasse = $request->motdepasse;
        $admin->save();

        $user = new User();
        $user->name = $admin->nom;
        $user->email = $admin->email;
        $user->password = $admin->motdepasse;
        $user->save();

        // Assigner le rôle 'admin' au nouvel utilisateur
        $adminRole = Role::where('name', 'admin')->first();
        $user->roles()->attach($adminRole);
        return redirect('/admin')->with('status', "L'administrateur a bien été ajouté avec succès.");
    }
    public function update_admin($id)
    {
        $admins = Administrateur::find($id);
        return view('Administrateurs.updateAdmin', compact('admins'));
    }
    public function update_admin_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required',
            'motdepasse' => 'required'
        ]);

        $admin = Administrateur::find($request->id);
        $admin->nom = $request->nom;
        $admin->email = $request->email;
        $admin->motdepasse = $request->motdepasse;
        $admin->update();


        return redirect('/listeAdmin')->with('status', "L'administrateur a bien été Modifier avec succès.");
    }
    public function delete_admin($id)
    {
        $admin = Administrateur::find($id);
        $admin->delete();
        return redirect('/listeAdmin')->with('status', "L'administrateur a bien été supprimé avec succès.");
    }
}
