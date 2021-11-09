<x-app-layout>
    <div class="p-12">
        <div class="w-full">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg mb-10">
                <div class="p-6 bg-white border-b border-gray-200">
                   <h3> Gestion des Rendez-vous</h3>
                </div>
            </div>
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('message') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row mb-3">
                <div class="col-12">
                    <div class="btn-group">
                        <a class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-file-excel"></i>
                            Exporter la liste
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="bg-white overflow-hidden shadow-sm">
                        <div class="bg-white border-b border-gray-200 p-4">
                                <table class="table table-hover">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Patient</th>
                                        <th>Téléphone Patient</th>
                                        <th>Spécialité</th>
                                        <th>Status</th>
                                        <th class="text-center">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rendezvous as $item)
                                    <tr>
                                        <td> {{ $item->id }} </td>
                                        <td> {{ date('d/m/Y à H:i', strtotime($item->created_at)) }} </td>
                                        <td> {{ $item->user->nom }} {{ $item->user->prenom }} </td>
                                        <td> {{ $item->user->phone }} </td>
                                        <td> {{ $item->specialite->libelle }} </td>
                                        <td> 
                                            @if ($item->status === "attente")
                                                <strong class="text-primary blink">
                                                    En attente
                                                </strong>
                                            @endif
                                            @if ($item->status === "confirme")
                                                <strong class="text-warning">
                                                    Confimé
                                                </strong>
                                            @endif
                                            @if ($item->status === "effectue")
                                                <strong class="text-success">
                                                    Effectué
                                                </strong>
                                            @endif
                                            @if ($item->status === "annule")
                                                <strong class="text-danger">
                                                    Annulé
                                                </strong>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a title="Voir" data-bs-toggle="modal" data-bs-target="#detail_{{ $item->id }}" class="btn btn-outline-primary btn-sm">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                                @if ($item->status === 'attente')
                                                    <a  title="Confirmer" data-bs-toggle="modal" data-bs-target="#confirm_{{ $item->id }}" class="btn btn-outline-primary btn-sm">
                                                        <i class="fa fa-check"></i>
                                                    </a>                                                    
                                                    <a title="Annuler" href="{{ route('cancelRDV', $item->id) }}" class="btn btn-outline-danger btn-sm">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                @endif
                                                @if ($item->status === 'confirme')                                                   
                                                    <a title="Effectué" href="{{ route('doneRDV', $item->id) }}" class="btn btn-outline-success btn-sm">
                                                        <i class="fa fa-user-check"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>


                                                        <!-- Modal -->
                                    <div class="modal fade" id="confirm_{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Confirmer Rendez-vous</h5>
                                                </div>
                                                <form action="{{ route('confirmRDV') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label for="">Date</label>
                                                                <x-input id="name" class="block mt-1 w-full" type="date" name="date_rdv" required autofocus />
                                                                {{ $errors->first('date_rdv') }}
                                                            </div>
                                                            <div class="col-12">
                                                                <label for="">Heure</label>
                                                                <x-input id="name" class="block mt-1 w-full" type="time" name="heure_rdv" required />
                                                                <x-input type="hidden" name="id" value="{{ $item->id }} " />
                                                                {{ $errors->first('heure_rdv') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-primary">Confirmer</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="detail_{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Informations du Rendez-vous</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="list-group">
                                                        <div class="row">
                                                            <div class="col-6 mb-1">
                                                                <div class="list-group-item">
                                                                    <h6> Patient : </h6>
                                                                    {{ $item->user->nom }} {{ $item->user->prenom }}
                                                                </div>
                                                            </div>
                                                            <div class="col-6 mb-1">
                                                                <div class="list-group-item">
                                                                     <h6> Contact Patient : </h6>
                                                                     {{ $item->user->phone }}
                                                                </div>
                                                            </div>
                                                            <div class="col-6 mb-1">
                                                                <div class="list-group-item">
                                                                     <h6> Date de création : </h6>
                                                                     {{ date('d/m/Y à H:i', strtotime($item->created_at)) }}
                                                                </div>
                                                            </div>
                                                            <div class="col-6 mb-1">
                                                                <div class="list-group-item">
                                                                     <h6> Spécialité : </h6>
                                                                     {{ $item->specialite->libelle }}
                                                                </div>
                                                            </div>
                                                            <div class="col-12 mb-1">
                                                                <div class="list-group-item">
                                                                     <h6> Commentaire : </h6>
                                                                     {{ $item->commentaire }}
                                                                </div>
                                                            </div>
                                                            <div class="col-6 mb-1">
                                                                <div class="list-group-item">
                                                                    <h6> Status : </h6>
                                                                    @if ($item->status === "attente")
                                                                        <strong class="text-primary blink">
                                                                            En attente
                                                                        </strong>
                                                                    @endif
                                                                    @if ($item->status === "confirme")
                                                                        <strong class="text-warning">
                                                                            Confimé
                                                                        </strong>
                                                                    @endif
                                                                    @if ($item->status === "effectue")
                                                                        <strong class="text-success">
                                                                            Effectué
                                                                        </strong>
                                                                    @endif
                                                                    @if ($item->status === "annule")
                                                                        <strong class="text-danger">
                                                                            Annulé
                                                                        </strong>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if ($item->status === "confirme" || $item->status === 'effectue')
                                                            <div class="row">
                                                                <div class="col-12 mt-3 mb-3">
                                                                    <h5>Informations de confirmation</h5>
                                                                </div>
                                                                <div class="col-6 mb-1">
                                                                    <div class="list-group-item">
                                                                        <h6> Date : </h6>
                                                                        {{ date('d/m/y', strtotime($item->date_rdv)) }}
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 mb-1">
                                                                    <div class="list-group-item">
                                                                        <h6> Heure : </h6>
                                                                        {{ date('H:i', strtotime($item->heure_rdv)) }}
                                                                    </div>
                                                                </div>
                                                            </div>                                                            
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>