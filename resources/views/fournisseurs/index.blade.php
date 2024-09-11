<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Fournisseurs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white flex items-center justify-between mx-6 px-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Liste des fournisseurs") }}
                </div>
                <div>
                <form action="{{route('fournisseurs.create')}}" method="get">
                        @csrf
                        <button class="bg-blue-600 hover:bg-blue-500 text-black text-sm px-3 py-2 rounded-md">Ajouter</button>
                    </form>
                </div>
            </div>
            <div class="bg-white flex items-center justify-between mx-6 px-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 w-full space-y-6">
                    <div class="w-full">
                        <form action="{{route('fournisseurs.index')}}" method="get">
                            <input type="text" placeholder="Rechercher par nom" class="w-2/3 rounded-md border border-gray-300" name="search">
                            <button class="bg-blue-600 hover:bg-blue-500 text-blue text-sm px-3 py-2 rounded-md">Rechercher</button>
                        </form>

                    </div>
                    <table class="w-full text-left">
                        <thead class="text-lg font-semibold bg-gray-300">
                            <th class="py-3 px-6">Nom</th>
                            <th class="py-3 px-6">Tel</th>
                            <th class="py-3 px-6">Actions</th>

                        </thead>
                        <tbody>
                        @forelse($fournisseurs as $fournisseur)
                            <tr class="bg-gray-100">
                                <td class="py-3 px-6">
                                {{$fournisseur->nom}}
                                </td>
                                <td class="py-3 px-6">
                                {{$fournisseur->tel}}
                                </td>
                                <td class="py-3 px-6">
                                    <a href="{{route('fournisseurs.edit',$fournisseur)}}">
                                        <button class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md">Editer</button>
                                    </a>
                                    <form action="{{route('fournisseurs.destroy',$fournisseur)}}" method="post">

                                    @csrf
                                    @method("DELETE")
                                    <button class="bg-red-600 hover:bg-red-500 text-white text-sm px-3 py-2 rounded-md">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <p>Aucun fournisseur</p>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{$fournisseurs->links()}}
                    </div>
               </div>
            </div>
        </div>
    </div>

</x-app-layout>

