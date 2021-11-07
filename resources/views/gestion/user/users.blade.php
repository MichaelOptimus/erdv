<x-app-layout>
    <div class="p-12">
        <div class="w-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-10">
                <div class="p-6 bg-white border-b border-gray-200">
                   <h3> Gestion des Gestionnaires</h3>
                </div>
            </div>
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('message') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="mb-4">
                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2" href="{{ url('/gestion/new-user') }}" >
                 Nouveau Gestionnaire
                 </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm">
                <div class="bg-white border-b border-gray-200 p-4">
                        <table class="table table-hover">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th>ID</th>
                                <th>Nom(s)</th>
                                <th>Prénom(s)</th>
                                <th>Genre</th>
                                <th>Téléphone</th>
                                <th>Email</th>
                                <th class="text-center">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                                <td> {{ $item->id }} </td>
                                <td> {{ $item->nom }} </td>
                                <td> {{ $item->prenom }} </td>
                                <td> {{ $item->genre}} </td>
                                <td> {{$item->phone }} </td>
                                <td> {{ $item->email }} </td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>