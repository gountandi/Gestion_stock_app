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
                    {{ __("modifier les informations d un fournisseur") }}
                </div>
            </div>
            <div class="bg-white flex items-center justify-between mx-6 px-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 w-full space-y-6">
                <form action="{{ route('fournisseurs.update',$fournisseur)}}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="space-y-6">
                        <div class="flex space-x-3 items-center">
                            <div class="space-y-2 w-1/3">
                                <label for="fournisseurs">Nom</label>
                                <input type="text" name="nom" id="nom" class="border-gray-300 rounded-md w-full" value="{{ old('nom')??$fournisseur->nom}}">

                            </div>
                            <div class="space-y-2 w-1/3">
                                <label for="fournisseur">Tel</label>
                                <input type="tel" name="tel" id="tel" class="border-gray-300 rounded-md w-full" value="{{ old('tel')??$fournisseur->tel}}" >

                            </div>
                        </div>

                    </div>
                    <div>
                        <button class="mt-6 bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md">
                            Valider
                        </button>
                    </div>
                </form>
               </div>
            </div>
        </div>
    </div>
</x-app-layout>
