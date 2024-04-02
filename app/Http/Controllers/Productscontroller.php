<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class Productscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return view("admin.products.index",compact("products"));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view("admin.products.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            //Sécurité : controle sur les chmaps
        "name"=>"required|max:100|unique:products",
        "description"=>"required",
        "price"=>"numeric",
        "photo1"=>"image|mimes:jpeg,png,jpg,gif|max:2048",
        "photo2"=>"image|mimes:jpeg,png,jpg,gif|max:2048",
        "category_id"=>"required|numeric"
     ]);
        $inputs=$request->all();
     //traiter les photos
     if($photo1=$request->file("photo1")){
         $newfile1=time().time().".".$photo1->getClientOriginalExtension();
         //ecraser l'ancienne photo

         $photo1->move('images/products/',$newfile1);
         $inputs['photo1']=$newfile1;
        }

        if($photo2=$request->file("photo2")){
            $newfile2=time().".".$photo2->getClientOriginalExtension();
            //ecraser l'ancienne photo

            $photo2->move('images/products/',$newfile2);
            $inputs['photo2']=$newfile2;
            }



        Product::create($inputs);

        return redirect()->route('products.index')->with("message","Un nouveau produit a été ajouté avec succès");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        return view("admin.products.edit",compact("product","categories"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            //Sécurité : controle sur les chmaps
        "name"=>"required|max:100",
        "description"=>"required",
        "price"=>"numeric",
        "photo1"=>"image|required|mimes:jpeg,png,jpg,gif|max:2048",
        "photo2"=>"image|required|mimes:jpeg,png,jpg,gif|max:2048",
        "category_id"=>"required"

    ]);


    $product::update($request->all());

    return redirect()->route('products.index')->with("message","Un produit a été modifié avec succès");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (file_exists("images/products".$product->photo1))  {
            unlink("images/products".$product->photo1);
        }

        if (file_exists("images/products".$product->photo2))  {
            unlink("images/products".$product->photo2);
         }

        $product->delete();
        return redirect()->route('products.index');
    }
}
