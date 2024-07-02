<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class AproposController extends Controller
{
    public function apropos(){
        $categories = Categorie::all();
        return view('Apropos.apropos', compact('categories'));

    }
}
