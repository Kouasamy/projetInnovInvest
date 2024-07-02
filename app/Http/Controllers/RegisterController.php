<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('auth.register', compact('categories'));
    }
}
