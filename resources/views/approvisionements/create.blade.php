@extends('layouts.base')
@section('content')
@vite('resources/js/approvisionement.js')

   <section>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Approvisionements') }}
        </h2>
    </x-slot>
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white flex items-center justify-between mx-6 px-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Faire un nouvel approvisionement") }}
                </div>
            </div>
            <div class="bg-white flex items-center justify-between mx-6 px-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 w-full space-y-6">
                <form action="{{route('approvisionements.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-6">
                        <div class="flex space-x-3 items-center">
                            <div class="space-y-2 w-1/3">
                                <label for="">Fournisseur</label>
                                <select name="fournisseur_id" id="fournisseur_id" class="border-gray-300 rounded-md w-full">
                                <option value="Sélectioné"></option>
                                @foreach($fournisseur as $four)
                                <option value="{{$four}}">{{$four->nom}}</option>
                                @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="flex space-x-3 items-center">
                            <div class="space-y-2 w-1/3">
                                <label for="">Produit</label>
                                <select  id="produit_id" class="border-gray-300 rounded-md w-full">
                                <option value="Sélectioné"></option>
                                @foreach($produit as $prod)
                                <option value="{{$prod}}">{{$prod->libelle}}</option>
                                @endforeach
                                </select>

                            </div>
                            <div class="space-y-2 w-1/3">
                                <label for="">Quantite</label>
                                <input type="number" name="quantite_id" id="quantite_id" class="border-gray-300 rounded-md w-full" min="1">
                            </div>
                            <div class="space-y-2 w-1/3">
                                <label for="">Prix_achat</label>
                                <input type="number" name="prix_achat_id" id="prix_achat_id" class="border-gray-300 rounded-md w-full" min="1">
                            </div>
                            <div>

                                <button class="mt-6 bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md" type="button" id="btn_ajouter1">+</button>
                            </div>
                        </div>
                        <div class="space-y-3 items-center">
                            <button class="mt-6 bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md">Enregistrer</button>

                            <table class="w-full text-left" >
                                <thead class="text-lg font-semibold bg-gray-300">
                                    <th class="py-3 px-6">Produit</th>
                                    <th class="py-3 px-6">Quantité</th>
                                    <th class="py-3 px-6">PrixAchatUnitaire</th>
                                    <th class="py-3 px-6">Actions</th>
                                </thead>
                                <tbody id="tableau_lignes_approvisionements">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
                @if($errors->any())
                {{ implode('', $errors->all('<div>:message</div>')) }}
                @endif
               </div>
            </div>
        </div>
    </div>
   </section>

@endsection

