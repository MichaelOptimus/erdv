<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   Modifier Gestionnaire
                </div>
                <div class="p-4">
                    @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('message') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('upadte-gestionnaire', $user->id) }}">
                    @csrf
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex space-x-4">
                            <div class="flex-1 mb-3">
                                <label for="">Nom(s) :</label>
                                <x-input id="name" class="block mt-1 w-full" type="text" name="nom" value="{{ $user->nom }}" required />
                                {{ $errors->first('nom') }}
                            </div>
                            <div class="flex-1 mb-3">
                                <label for="">Prénom(s) :</label>
                                <x-input id="name" class="block mt-1 w-full" type="text" name="prenom" value="{{ $user->prenom }}" required />
                                {{ $errors->first('prenom') }}
                            </div>
                            <div class="flex-1 mb-3">
                                <label for="">Date de Naissance :</label>
                                <x-input id="name" class="block mt-1 w-full" type="date" name="datenaissance" value="{{ $user->datenaissance }}" required />
                                {{ $errors->first('datenaissance') }}
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <div class="flex-1 mb-3">
                                <label for="">Email :</label>
                                <x-input id="name" class="block mt-1 w-full" type="text" name="email" value="{{ $user->email }}" disabled />
                                {{ $errors->first('email') }}
                            </div>
                            <div class="flex-1 mb-3">
                                <label for="">Téléphone:</label>
                                <x-input id="name" class="block mt-1 w-full" type="text" name="phone" value="{{ $user->phone }}" required />
                                {{ $errors->first('phone') }}
                            </div>
                            <div class="flex-1 mb-3">
                                <label for="">Sexe :</label>
                                <select class="w-full block rounded-lg border-gray-300 mt-1 shadow-sm" name="genre" value="{{ $user->genre }}">
                                    <option {{ $user->genre == 'Homme'  ? 'selected' : '' }} value="Homme">Homme</option>
                                    <option {{ $user->genre == 'Femme'  ? 'selected' : '' }} value="Femme">Femme</option>
                                </select>
                            </div>
                        </div>
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" type="submit">
                            Mettre à jour
                        </button>
                    </div>
                <form>
            </div>
        </div>
    </div>
</x-app-layout>