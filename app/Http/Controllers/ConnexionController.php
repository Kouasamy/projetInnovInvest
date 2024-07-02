<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionController extends Controller
{
   public function connexion(){
    return view('auth.login');
   }
}
