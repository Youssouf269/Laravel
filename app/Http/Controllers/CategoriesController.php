<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        // compact sert a transmettre les variables vers la vue
        return view("admin.categories.index",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            //Sécurité : controle sur les chmaps
        "name"=>"required|max:100|unique:categories"
    ]);

        //insertion dans la base de données
        Category::create($request->all());
        //redirection vers la page liste avec l'nvoi d'un message de succes
        return redirect()->route('categories.index')->with("message","Une nouvelle categorie a été ajouté avec succès");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("admin.categories.edit",compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
      $request->validate([
        'nom'=>'required'
      ]);
      //mise a joue avec eloquent
      $categoy->update($request->all());
      //redirection vers index
      return redirect()->route("categories.index")->with("messag","La categorie est modifié avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with("message","Une categorie a été suprimée avec succès");
    }
}
