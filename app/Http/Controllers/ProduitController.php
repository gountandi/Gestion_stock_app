<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduitRequest;
use App\Http\Requests\UpdateProduitRequest;
use Illuminate\Http\Request;
use App\Models\Produit;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search_value=$request->input("search");
        $pagination_number=5;
        if ($search_value){
             $produits = Produit::where("categorie", "like", "%".$search_value. "%")
             ->orWhere("libelle", $search_value)
             ->orWhere("prix", $search_value)
             ->orWhere("qte_stock", $search_value)
             ->orWhere("marque", $search_value)
             ->paginate($pagination_number);
        }
        else{
             $produits = Produit::paginate($pagination_number);

        }
        return view('produits.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produits.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProduitRequest $request)
    {
        $validated_data=$request->validate([
            'libelle' => 'required|max:255',
            'prix_unitaire' => 'required',
            'qte_stock' => 'required',
            'marque'=>'required',
            'categorie'=>'required',



        ]);


         //Generer l'image
         $image_produit=$request->file("image");
         $id=Produit::max("id")+1;
         $ext= $image_produit->getClientOriginalExtension();
         $nom_image=strtolower($request->libelle."_".$id.".".$ext);

         //sauvegarder l'image
         $image_produit->storeAs("public/produits", $nom_image);

         //changer le chemin de l'image
         $data=$validated_data;
         $data["image"]=$nom_image;

         //dd($data);

         Produit::create($data);

         return redirect()->route('produits.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        return view('produits.edit',compact('produit'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProduitRequest $request, Produit $produit)
    {
        $validated_data=$request->validate([
            'libelle' => 'required|max:255',
            'prix_unitaire' => 'required',
            'qte_stock' => 'required',
            'marque'=>'required',
            'categorie'=>'required',


          ]);

        /*

        //Generer l'image
         $image_produit=$request->file("image");
         $id=Produit::max("id")+1;
         $ext=$image_produit->getClientOriginalExtension();
         $nom_image=strtolower($request->libelle."_".$id.".".$ext);

         //sauvegarder l'image
         $image_produit->storeAs("public/produits", $nom_image);

         //changer le chemin de l'image
         $data=$validated_data;
         $data["image"]=$nom_image;


          $data=$validated_data;
          $data["image"]=$nom_image;
        */
        $produit->update($validated_data);
        return redirect()->route('produits.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();
        return redirect()->route('produits.index');
    }
}
