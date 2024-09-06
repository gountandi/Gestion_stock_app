<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __(' Enregistrer approvisionement') }}
        </h2>
        <body class="bg-black">

        </body>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white flex items-center justify-between mx-6 px-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Liste des approvisionements") }}
                </div>
                <div>
                <form action="{{route('approvisionements.create')}}" method="get">
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
                            <th class="py-3 px-6">Gerant</th>
                            <th class="py-3 px-6">Fournisseur</th>
                            <th class="py-3 px-6">Prix_achat</th>
                            <th class="py-3 px-6">Date</th>
                            <th class="py-3 px-6">Actions</th>
                        </thead>
                        <tbody>
                        @forelse($approvisionements as $approvisionement)
                            <tr class="bg-gray-100">
                            <td class="py-3 px-6"><img src="/images/{{ $approvisionement->image }}" width="100px"></td>
                                <td class="py-3 px-6">
                                {{$approvisionement->vendeur_id}}
                                </td>
                                <td class="py-3 px-6">
                                {{$approvisionement->fournisseur}}
                                </td>
                                <td class="py-3 px-6">
                                {{$approvisionement->prix_achat_unitaire}}
                                </td>
                                <td class="py-3 px-6">
                                {{$approvisionement->lignesapprovisionements->date_livraison}}
                                </td>
                                <td class="py-3 px-6">

                                    <a href="{{route('approvisionements.edit',$approvisionement)}}">
                                        <button class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md">Editer</button>
                                    </a>
                                    <a href="{{route('approvisionements.show',$approvisionement)}}">
                                        <button class="bg-yellow-600 hover:bg-yellow-500 text-white text-sm px-3 py-2 rounded-md">Consulter</button>
                                    </a>

                                    <form action="{{route('approvisionements.destroy',$approvisionement)}}" method="post">

                                    @csrf
                                    @method("DELETE")
                                        <button class="bg-red-600 hover:bg-red-500 text-white text-sm px-3 py-2 rounded-md">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <p>Aucun approvisionement</p>
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


