@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Thèmes</title>
@endsection

@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Thèmes <i class="ion-grid"></i> </div>
                </div>

                <div class="col-sm-8">
                    <div class="buttons text-right">
                        <a href="{{ route('admin.themes.create') }}" class="btn btn-primary btn-md pull-right">
                            <i class="ion-plus"></i> Ajouter
                        </a>

                        <form class="search-form pull-right" action="">
                            <input type="text" name="q" placeholder="Rechercher thème" autocomplete="off">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="_subheader">
        <div class="container-fluid">
            <form class="_form" action="" method="post">
                <div class="row">
                    <div class="col-sm-3">
                        <label>Statut</label>
                        <select class="form-control" name="status">
                            <option value="1">Public</option>
                            <option value="0">Privé</option>
                        </select>
                    </div>

                    <div class="col-sm-3"></div>
                    <div class="col-sm-3"></div>

                    <div class="col-sm-3 text-right mt-20">
                        <button type="submit" class="btn btn-teal btn-md">
                            <i class="ion-android-funnel"></i> Filtrer
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="dashboard">
        <div class="container-fluid">
            @if(session('message'))
               <div class="alert alert-success alert-dismissible" role="alert">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   {{ session('message') }}
               </div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Ajoutée le</th>
                        <th>Modifié</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($themes as $theme)
                        <tr>
                            <td>{{ $theme->name }}</td>
                            <td>{{ date('d/m/Y h:i', strtotime($theme->created_at)) }}</td>
                            <td>{{ date('d/m/Y h:i', strtotime($theme->updated_at)) }}</td>
                            <td>
                                <a href="{{ route('admin.themes.edit', $theme->id) }}" class="edit-icon">
                                    <i class="ion-edit"></i>
                                </a>
                                <a class="delete-icon" data-toggle="modal" data-target="#{{ $theme->id}}">
                                    <i class="ion-trash-a"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="{{ $theme->id}}" tabindex="-1" role="dialog" aria-labelledby="detePartnerLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h5 class="modal-title" id="detePartnerLabel">Suppression du thème</h5>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                               </div>
                              </div>
                              <div class="modal-body">
                                <p>Voulez vous supprimer ce thème ?</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulé</button>
                                <a href="{{ route('admin.themes.delete', $theme->id) }}" class="btn btn-danger btn-md active" role="button" aria-pressed="true">Supprimé</a>
                              </div>
                            </div>
                          </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
          {{ $themes->links() }}
        </div>
    </section>
@stop
