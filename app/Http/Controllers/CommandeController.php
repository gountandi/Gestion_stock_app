<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommandeRequest;
use App\Http\Requests\UpdateCommandeRequest;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Models\Produit;



class CommandeController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search_value=$request->input("search");

        $pagination_number=5;
         if ($search_value){
             $commandes = Commande::where("client", "like", "%".$search_value. "%")
             ->orWhere("date_cmd", $search_value)
             ->orWhere("montant", $search_value)
             ->paginate($pagination_number);
        }
        else{
             $commandes = Commande::paginate($pagination_number);

        }
        return view('commandes.index', compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produit=Produit::all();
        return view('commandes.create',compact('produit'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommandeRequest $request)
    {
        $request->validate([
            'client' => 'required',
            'montant' => 'required',
            'date_cmd' => 'required',


          ]);
        //Commande::create($request->all());

        $client=$request->input("cilent");
        $vendeur=Auth::user();
        $produits_ids=$request->input(("produits_ids"));
        $qte_ligne=$request->input("qte_ligne");

        Commande::create([
            "client"=>$client,
            "vendeur_id"=>$vendeur->id,
        ]);

        for($i=0;$i<count($produits_ids);$i++){
            $produit=$produits_ids[$i];
            $quantite=$quantites[$i];

            LigneCommande::create([
                "quantite"=>$quantite,
                "prod_id"=>$produit,
            ]);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Commande $commande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commande $commande)
    {
        return view('commandes.edit',compact('commande'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommandeRequest $request, Commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        $commande->delete();
        return redirect()->route('commandes.index');
    }

    public function generer_facture(Commande $commande){

        return (new LaraTeX('latex.facture'))->with([
             'commande'=>$commande,
         ])->download('facture.pdf');
     }
}
