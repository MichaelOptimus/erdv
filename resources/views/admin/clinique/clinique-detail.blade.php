<x-app-layout>
    <div class="pt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   Informations Clinique
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row">
                <div class="col-4">
                    <div class='p-2 border-2 mb-3 rounded-lg border-black'>
                        <h5><strong>Raison Sociale : </strong></h5>
                        {{ $clinique->nom }}
                    </div>
                    <div class='p-2 border-2 mb-3 rounded-lg border-black'>
                        <h5><strong>Adresse : </strong></h5>
                        {{ $clinique->addresse }}
                    </div>
                    <div class='p-2 border-2 mb-3 rounded-lg border-black'>
                        <h5><strong>Téléphone : </strong></h5>
                        {{ $clinique->phone }}
                    </div>
                    <div class='p-2 border-2 mb-3 rounded-lg border-black'>
                        <h5><strong>Email : </strong></h5>
                        {{ $clinique->email }}
                    </div>
                    <div class='p-2 border-2 mb-3 rounded-lg border-black'>
                        <h5><strong>Enregistrée depuis : </strong></h5>
                        {{ date('d/m/Y à H:i', strtotime($clinique->created_at)) }}
                    </div>
                </div>
                <div class="col-8">
                    @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('message') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="mb-4">
                        <a class="bg-blue-500 hover:bg-blue-700 pointer text-white font-bold py-2 px-4 rounded mr-2" data-bs-toggle="modal" data-bs-target="#newGestion" >
                            Nouveau Gestionnaire
                        </a>
                    </div>
                    <div class="bg-white border-b border-gray-200 p-4">
                        <table class="table table-hover">
                            <thead>
                                <tr class="bg-primary text-white">
                                    <th>ID</th>
                                    <th>Nom(s)</th>
                                    <th>Prénom(s)</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th class="text-center">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gestionnaires as $item)
                                <tr>
                                    <td> {{ $item->id }} </td>
                                    <td> {{ $item->nom }} </td>
                                    <td> {{ $item->prenom }} </td>
                                    <td> {{$item->phone }} </td>
                                    <td> {{ $item->email }} </td>
                                    <td class="text-center">
                                        <a class="btn btn-primary btn-sm">Afficher</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newGestion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nouveau Gestionnaire</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('saveGestion') }}" method="POST" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="flex space-x-4">
                        <div class="flex-1 mb-3">
                            <label for="">Nom(s) :</label>
                            <x-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus />
                            {{ $errors->first('nom') }}
                        </div>
                        <div class="flex-1 mb-3">
                            <label for="">Prénom(s) :</label>
                            <x-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required />
                            {{ $errors->first('prenom') }}
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <div class="flex-1 mb-3">
                            <label for="">Date de naissance :</label>
                            <x-input id="name" class="block mt-1 w-full" type="date" name="datenaissance" maxlength="9" :value="old('datenaissance')" required />
                            {{ $errors->first('datenaissance') }}
                        </div>
                        <div class="flex-1 mb-3">
                            <label for="">Sexe :</label>
                                <select class="w-full block rounded-lg border-gray-300 mt-1 shadow-sm" name="genre">
                                    <option value="Homme">Homme</option>
                                    <option value="Femme">Femme</option>
                                </select>
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <div class="flex-1 mb-3">
                            <label for="">Email :</label>
                            <x-input id="name" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required />
                            {{ $errors->first('email') }}
                        </div>
                        <div class="flex-1 mb-3">
                            <label for="">Téléphone :</label>
                            <x-input id="name" class="block mt-1 w-full" type="text" name="phone" maxlength="9" :value="old('phone')" required />
                            {{ $errors->first('phone') }}
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <div class="flex-1 mb-3">
                            <label for="">Mot de passe:</label>
                            <x-input id="name" class="block mt-1 w-full" type="password" name="password" required />
                            <x-input type="hidden" name="clinique" value="{{ $clinique->id }}" />
                            {{ $errors->first('password') }}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>                
            </form>
        </div>
    </div>
    </div>
</x-app-layout>