@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Offre</title>
@endsection



@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Offre <i class="ion-social-buffer"></i> </div>
                </div>

                <div class="col-sm-8">
                    <div class="buttons text-right">
                        <a href="{{ route('admin.offers.create') }}" class="btn btn-primary btn-md pull-right">
                            <i class="ion-plus"></i> Ajouter
                        </a>

                        <form class="search-form pull-right" action="">
                            <input type="text" name="q" placeholder="Recherche partenaires" autocomplete="off">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="dashboard">
        <div class="container-fluid">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('success') }}
                </div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Créé</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($offers as $offer)
                        <tr>
                            <td>{{ $offer->name }}</td>
                            <td>
                             {{ str_limit(strip_tags($offer->description), 50) }}
                                    @if (strlen(strip_tags($offer->description)) > 50)
                                      ...
                                    @endif
                            </td>
                            <td>{{ $offer->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.offers.edit', $offer->id) }}" class="edit-icon">
                                    <i class="ion-edit"></i>
                                </a>
                                <a class="delete-icon" data-toggle="modal" data-target="#{{ $offer->id}}">
                                    <i class="ion-trash-a"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="{{$offer->id}}" tabindex="-1" role="dialog" aria-labelledby="detePartnerLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h5 class="modal-title" id="detePartnerLabel">Suppression de l'offre</h5>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                               </div>
                              </div>
                              <div class="modal-body">
                                <p>Voulez vous supprimer cette Offre?</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulé</button>
                                <a href="{{ route('admin.offers.delete', $offer->id) }}" class="btn btn-danger btn-md active" role="button" aria-pressed="true">Supprimé</a>
                              </div>
                            </div>
                          </div>
                        </div>
                    @endforeach

                </tbody>
            </table>
           {{ $offers->links() }}
        </div>
    </section>


@endsection
