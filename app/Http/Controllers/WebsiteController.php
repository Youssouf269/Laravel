<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function accueil(){
        return view("website.accueil");

    }

    public function checkout(){
        $products=session()->get("panier");
        return view("website.checkout", compact("products"));

    }

    public function presentation(){
        return view("website.presentation");

    }


    public function produits1(){

        $products=Product::all();
        return view("website.produits", compact("products"));


    }

    public function contact1(){
        return view("website.contact");


    }

    //si votre methode recoit des parametres à partir d'un formulaire
    //vous devez passer au parametre de la fonction un objet de type request
    // dd() cest pour stocker/afficher des elements de tous types, comme print_r avec les tableaux
    public function save(Request $request){
       // dd($request->nom); // dd() pour afficher le contenu des variables

        // comment faire passer un ou plusieurs parametres du formulaire vers la vue???? compact("nomparametre","parametre2"...)
        return view("website.save", compact("request"));


    }
}
