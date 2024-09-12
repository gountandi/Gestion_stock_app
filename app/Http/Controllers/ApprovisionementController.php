<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApprovisionementRequest;
use App\Http\Requests\UpdateApprovisionementRequest;
use App\Models\Approvisionement;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Fournisseur;


class ApprovisionementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search_value=$request->input("search");

        $pagination_number=5;
         if ($search_value){
             $approvisionements = Approvisionement::where("produit", "like", "%".$search_value. "%")
             ->orWhere("prix_achat_unitaire", $search_value)
             ->paginate($pagination_number);
        }
        else{
             $approvisionements = Approvisionement::paginate($pagination_number);

        }
        return view('approvisionements.index', compact('approvisionements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fournisseur=Fournisseur::all();
        $produit=Produit::all();
        return view('approvisionements.create',compact('produit','fournisseur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApprovisionementRequest $request)
    {


        $fournisseur=$request->input("fournisseur_id");
        $gerant=Auth::user();
        $produits_ids=$request->input(("produits_ids"));
        $qte_achat=$request->input("qte_achat");

        Approvisionement::create([
            "fournisseur"=>$fournisseur,
            "gerant_id"=>$gerant->id,
        ]);

        for($i=0;$i<count($produits_ids);$i++){
            $produit=$produits_ids[$i];
            $quantite=$quantites[$i];

            LigneApprovisionement::create([
                "qte_achat"=>$quantite,
                "prod_id"=>$produit,
            ]);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Approvisionement $approvisionement)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Approvisionement $approvisionement)
    {
        return view('approvisionements.edit',compact('approvisionement'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApprovisionementRequest $request, Approvisionement $approvisionement)
    {
        $approvisionement->update($request->all());
        return redirect()->route('approvisionements.edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Approvisionement $approvisionement)
    {
        $approvisionement->delete();
        return redirect()->route('approvisionements.index');
    }
}
