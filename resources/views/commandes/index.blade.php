<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __(' Enregistrer commande') }}
        </h2>
        <body class="bg-black">

        </body>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white flex items-center justify-between mx-6 px-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Liste des commandes") }}
                </div>
                <div>
                <form action="{{route('commandes.create')}}" method="get">
                        @csrf
                        <button class="bg-blue-600 hover:bg-blue-500 text-black text-sm px-3 py-2 rounded-md">Ajouter</button>
                    </form>
                </div>
            </div>
            <div class="bg-white flex items-center justify-between mx-6 px-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 w-full space-y-6">
                    <div class="w-full">
                        <input type="text" placeholder="Rechercher" class="w-2/3 rounded-md border border-gray-300">
                        <button class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md">Rechercher</button>
                    </div>
                    <table class="w-full text-left">
                        <thead class="text-lg font-semibold bg-gray-300">
                            <th class="py-3 px-6">Vendeur</th>
                            <th class="py-3 px-6">Client</th>
                            <th class="py-3 px-6">Monant</th>
                            <th class="py-3 px-6">Date</th>
                            <th class="py-3 px-6">Actions</th>
                        </thead>
                        <tbody>
                        @forelse($commandes as $commande)
                            <tr class="bg-gray-100">
                            <td class="py-3 px-6"><img src="/images/{{ $commande->image }}" width="100px"></td>
                                <td class="py-3 px-6">
                                {{$commande->vendeur_id}}
                                </td>
                                <td class="py-3 px-6">
                                {{$commande->client}}
                                </td>
                                <td class="py-3 px-6">
                                {{$commande->montant}}
                                </td>
                                <td class="py-3 px-6">
                                {{$commande->date}}
                                </td>
                                <td class="py-3 px-6">
                                    <a href="{{route('generer_facture',$commande)}}">
                                        <button class="bg-green-600 hover:bg-green-500 text-white text-sm px-3 py-2 rounded-md">Facture</button>
                                    </a>
                                    <a href="{{route('commandes.edit',$commande)}}">
                                        <button class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md">Editer</button>
                                    </a>
                                    <a href="{{route('commandes.show',$commande)}}">
                                        <button class="bg-yellow-600 hover:bg-yellow-500 text-white text-sm px-3 py-2 rounded-md">Consulter</button>
                                    </a>

                                    <form action="{{route('commandes.destroy',$commande)}}" method="post">

                                    @csrf
                                    @method("DELETE")
                                        <button class="bg-red-600 hover:bg-red-500 text-white text-sm px-3 py-2 rounded-md">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <p>Aucune commande</p>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        <!-- Pagination si vous voulez le faire -->
                    </div>
               </div>
            </div>
        </div>
    </div>
</x-app-layout>


