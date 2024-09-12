<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Commandes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{$errors}}
        <script src="{{asset('js/commande.js')}}"></script>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white flex items-center justify-between mx-6 px-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Ajouter une nouvelle commande") }}
                </div>
            </div>
            <div class="bg-white flex items-center justify-between mx-6 px-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 w-full space-y-6">
                <form action="{{route('commandes.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-6">
                        <div class="flex space-x-3 items-center">
                            <div class="space-y-2 w-1/3">
                                <label for="">Client</label>
                                <select name="client_id" id="client_id" class="border-gray-300 rounded-md w-full">
                                <option value="Sélectioné"></option>
                                @foreach($client as $cli)
                                <option value="{{$cli->id}}">{{$cli->nom}}</option>
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
                                <option value="{{$prod}}">{{$prod->libelle}}</option>
                                @endforeach
                                </select>

                            </div>
                            <div class="space-y-2 w-1/3">
                                <label for="">*Quantite</label>
                                <input type="number" name="quantite" id="quantite_id" class="border-gray-300 rounded-md w-full" min="0">
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
                                    <th class="py-3 px-6">Quantité</th>
                                    <th class="py-3 px-6">Montant</th>
                                    <th class="py-3 px-6">Actions</th>
                                </thead>
                                <tbody id="tableau_lignes_commandes">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
               </div>
            </div>
        </div>
    </div>
</x-app-layout>


