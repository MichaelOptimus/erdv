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
                    <div class="mb-4">
                        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2" data-toggle="modal" data-target="#newGestion" >
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
                                {{-- @foreach ($cliniques as $item)
                                <tr>
                                    <td> {{ $item->id }} </td>
                                    <td> {{ $item->nom }} </td>
                                    <td> {{ $item->addresse }} </td>
                                    <td> {{$item->phone }} </td>
                                    <td> {{ $item->email }} </td>
                                    <td class="text-center">
                                        <a href="{{ url('/admin/clinique/' . $item->id) }}" class="btn btn-primary btn-sm">Afficher</a>
                                    </td>
                                </tr>
                                @endforeach --}}
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
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>
</x-app-layout>