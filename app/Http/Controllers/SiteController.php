<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function accueil(){
        return view("accueil");
    }

    public function contact(){
        return view("contact");
    }
}
