@extends('layouts.base')
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Approvisionement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white flex items-center justify-between mx-6 px-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("modifier un approvisionement") }}
                </div>
            </div>
            <div class="bg-white flex items-center justify-between mx-6 px-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 w-full space-y-6">
                <form action="{{ route('approvisionements.update',$approvisionement)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="space-y-6">
                        <div class="flex space-x-3 items-center">
                            <div class="space-y-2 w-1/3">
                                <label for="">Fournisseur</label>
                                <select name="fournisseur_id" id="fournisseur_id" class="border-gray-300 rounded-md w-full">
                                <option value="Sélectioné"></option>
                                @foreach($fournisseur as $four)
                                <option value="{{$four->id}}">{{$four->libelle}}</option>
                                @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="flex space-x-3 items-center">
                            <div class="space-y-2 w-1/3">
                                <label for="">Produit</label>
                                <select name="produit" id="produit_id" class="border-gray-300 rounded-md w-full">
                                <option value="Sélectioné"></option>
                                @foreach($produit as $prod)
                                <option value="{{$prod->id}}">{{$prod->libelle}}</option>
                                @endforeach
                                </select>

                            </div>
                            <div class="space-y-2 w-1/3">
                                <label for="qte_approvisionner">Quantite</label>
                                <input type="number" name="quantiter_id" id="quantite_id" class="border-gray-300 rounded-md w-full" min="1">
                            </div>
                            <div class="space-y-2 w-1/3">
                                <label for="date_livraison">Prix_achat</label>
                                <input type="number" name="prix_achat_id" id="prix_achat_id" class="border-gray-300 rounded-md w-full">
                            </div>
                            <div>
                                <button class="mt-6 bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md" type="button" id="btn_ajouter">+</button>
                            </div>
                        </div>
                        <div class="space-y-3 items-center">
                            <button class="mt-6 bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md">Enregistrer</button>
                            <table class="w-full text-left" >
                                <thead class="text-lg font-semibold bg-gray-300">
                                    <th class="py-3 px-6">Produit</th>
                                    <th class="py-3 px-6">Date_livraison</th>
                                    <th class="py-3 px-6">Quantite_achat</th>
                                    <th class="py-3 px-6">Actions</th>
                                </thead>
                                <tbody id="tableau_lignes_approvisionements">

                                    <tr></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
                @if($errors->any())
                {{ implode('', $errors->all('<div>:message</div>')) }}
               </div>
            </div>
        </div>
    </div>
@endsection

