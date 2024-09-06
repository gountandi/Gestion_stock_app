<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Produits') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white flex items-center justify-between mx-6 px-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Liste des produits") }}
                </div>
                <div>
                <form action="{{route('produits.create')}}" method="get">
                        @csrf
                        <button class="bg-blue-600 hover:bg-blue-500 text-black text-sm px-3 py-2 rounded-md">Ajouter</button>
                    </form>
                </div>
            </div>
            <div class="bg-white flex items-center justify-between mx-6 px-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 w-full space-y-6">
                    <div class="w-full">
                        <form action="{{route('produits.index')}}" method="get">
                            <input type="text" placeholder="Rechercher par cathegorie" class="w-2/3 rounded-md border border-gray-300" name="search">
                            <button class="bg-blue-600 hover:bg-blue-500 text-blue text-sm px-3 py-2 rounded-md">Rechercher</button>
                        </form>

                    </div>
                    <table class="w-full text-left">
                        <thead class="text-lg font-semibold bg-gray-300">
                            <th class="py-3 px-6">Image</th>
                            <th class="py-3 px-6">Libelle</th>
                            <th class="py-3 px-6">Prix</th>
                            <th class="py-3 px-6">Quantité</th>
                            <th class="py-3 px-6">Marque</th>
                            <th class="py-3 px-6">Categorie</th>
                            <th class="py-3 px-6">Actions</th>
                        </thead>
                        <tbody>
                        @forelse($produits as $produit)
                            <tr class="bg-gray-100">
                                <td class="py-3 px-6">

                                    <img src="{{ $chemin_image.$produit->image }}" width="100px" alt="{{$chemin_image.$produit->image }}"></td>
                                <td class="py-3 px-6">
                                {{$produit->libelle}}
                                </td>
                                <td class="py-3 px-6">
                                {{$produit->prix_unitaire}}
                                </td>
                                <td class="py-3 px-6">
                                {{$produit->qte_stock}}
                                </td>
                                <td class="py-3 px-6">
                                    {{$produit->marque}}
                                </td>
                                <td class="py-3 px-6">
                                    {{$produit->categorie}}
                                </td>
                                <td class="py-3 px-6">
                                    <a href="{{route('produits.edit',$produit)}}">
                                        <button class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md">Editer</button>
                                    </a>
                                    <form action="{{route('produits.destroy',$produit)}}" method="post">

                                    @csrf
                                    @method("DELETE")
                                    <button class="bg-red-600 hover:bg-red-500 text-white text-sm px-3 py-2 rounded-md">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <p>Aucun produit</p>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{$produits->links()}}
                    </div>
               </div>
            </div>
        </div>
    </div>

</x-app-layout>

