@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Partenaire</title>
@endsection



@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Partenaires <i class="ion-network"></i> </div>
                </div>

                <div class="col-sm-8">
                    <div class="buttons text-right">
                        <a href="{{ route('admin.partners.create') }}" class="btn btn-primary btn-md pull-right">
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
                        <th>Category</th>
                        <th>Créé</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($partners as $partner)
                        <tr>
                            <td>
                                <a href="{{ route('admin.partners.edit', $partner->id) }}">
                                    {{ $partner->name }}
                                </a>
                            </td>
                            <td>{{ $partner->category }}</td>
                            <td>{{ $partner->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.partners.edit', $partner->id) }}" class="edit-icon">
                                    <i class="ion-edit"></i>
                                </a>
                                <a class="delete-icon" data-toggle="modal" data-target="#{{ $partner->id}}">
                                    <i class="ion-trash-a"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="{{$partner->id}}" tabindex="-1" role="dialog" aria-labelledby="detePartnerLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h5 class="modal-title" id="detePartnerLabel">Suppression du partenaire</h5>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                               </div>
                              </div>
                              <div class="modal-body">
                                <p>Voulez vous supprimer ce partenaire?</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulé</button>
                                <a href="{{ route('admin.partners.delete', $partner->id) }}" class="btn btn-danger btn-md active" role="button" aria-pressed="true">Supprimé</a>
                              </div>
                            </div>
                          </div>
                        </div>
                    @endforeach

                </tbody>
            </table>
           {{ $partners->links() }}
        </div>
    </section>


@endsection
