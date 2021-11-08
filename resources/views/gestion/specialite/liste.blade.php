<x-app-layout>
    <div class="p-12">
        <div class="w-full">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg mb-10">
                <div class="p-6 bg-white border-b border-gray-200">
                   <h3> Gestion des Spécialités</h3>
                </div>
            </div>
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('message') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="mb-4">
                <a class="bg-blue-500 hover:bg-blue-700 cursor-pointer text-white font-bold py-2 px-4 rounded mr-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                 Nouvelle Spécialité
                 </a>
            </div>
            <div class="row">
                @foreach ($specialites as $item)
                <div class="col-3 mb-3">
                    <div class="card rounded-lg">
                        <div class="card-body text-center">
                            <i class="fa fa-3x fa-hand-holding-medical mb-4"></i> <br>
                            <h5>{{ $item->libelle }}</h5>
                        </div>
                        <div class="card-footer bg-white">
                            <a data-bs-toggle="modal" data-bs-target="#editSpec_{{ $item->id }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-edit"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="editSpec_{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Modifier Spécialité</h5>
                            </div>
                            <form action="{{ route('editSpecialite', $item->id) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="">Libellé</label>
                                            <x-input id="name" class="block mt-1 w-full" type="text" name="libelle" value="{{ $item->libelle }} " required autofocus />
                                            {{ $errors->first('libelle') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-success">Mettre à jour</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Nouvelle Spécialité</h5>
                </div>
                <form action="{{ route('saveSpecialite') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="">Libellé</label>
                                <x-input id="name" class="block mt-1 w-full" type="text" name="libelle" :value="old('libelle')" required autofocus />
                                {{ $errors->first('libelle') }}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>