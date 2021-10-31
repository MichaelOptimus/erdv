<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   New Admin
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex space-x-4">
                        <div class="flex-1">
                            <label for="">Nom(s) :</label>
                            <input type="text" class="w-full rounded-lg border-gray-300 mt-2 mb-3">
                        </div>
                        <div class="flex-1">
                            <label for="">Prénom(s) :</label>
                            <input type="text" class="w-full rounded-lg border-gray-300 mt-2 mb-3">
                        </div>
                        <div class="flex-1">
                            <label for="">Date de Naissance :</label>
                            <input type="date" class="w-full rounded-lg border-gray-300 mt-2 mb-3">
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <div class="flex-1">
                            <label for="">Email :</label>
                            <input type="email" class="w-full rounded-lg border-gray-300 mt-2 mb-3">
                        </div>
                        <div class="flex-1">
                            <label for="">Téléphone:</label>
                            <input type="tel" maxlength="9" class="w-full rounded-lg border-gray-300 mt-2 mb-3">
                        </div>
                        <div class="flex-1">
                            <label for="">Sexe :</label>
                            <select class="w-full rounded-lg border-gray-300 mt-2 mb-3">
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <div class="flex-1">
                            <label for="">Mot de passe :</label>
                            <input type="password" class="w-full rounded-lg border-gray-300 mt-2 mb-3">
                        </div>
                        <div class="flex-1">
                            <label for="">Confirmation de mot de passe :</label>
                            <input type="password" class="w-full rounded-lg border-gray-300 mt-2 mb-3">
                        </div>
                    </div>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Sauvegarder
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>