<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   Nouvelle Clinique
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('saveClinique') }}">
                    @csrf
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex space-x-4">
                            <div class="flex-1 mb-3">
                                <label for="">Nom :</label>
                                <x-input id="name" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus />
                                {{ $errors->first('nom') }}
                            </div>
                            <div class="flex-1 mb-3">
                                <label for="">Addresse :</label>
                                <x-input id="name" class="block mt-1 w-full" type="text" name="addresse" :value="old('addresse')" required />
                                {{ $errors->first('addresse') }}
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <div class="flex-1 mb-3">
                                <label for="">Email :</label>
                                <x-input id="name" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required />
                                {{ $errors->first('email') }}
                            </div>
                            <div class="flex-1 mb-3">
                                <label for="">Téléphone:</label>
                                <x-input id="name" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
                                {{ $errors->first('phone') }}
                            </div>
                        </div>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                            Sauvegarder
                        </button>
                    </div>
                <form>
            </div>
        </div>
    </div>
</x-app-layout>