@extends('backend.layouts.master')


@section('head')
    <title>Dashboard</title>
@endsection



@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Projets <i class="ion-social-buffer"></i> </div>
                </div>

                <div class="col-sm-8">
                    <div class="buttons text-right">
                        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-md pull-right">
                            <i class="ion-plus"></i> Ajouter
                        </a>

                        <form class="search-form pull-right" action="">
                            <input type="text" name="q" placeholder="Rechercher un projet" autocomplete="off">
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
                            <option value="en_cours">En Cours</option>
                            <option value="termine">Terminé</option>
                            <option value="annule">Annulé</option>
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
                        <th>Titre</th>
                        <th>Chef de projet</th>
                        <th>Status</th>
                        <th>Ajouté le</th>
                        <th>Modifié</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->owner }}</td>
                            <td>
                                @if ($project->status === 'en_cours')
                                    En cours
                                @endif

                                @if ($project->status === 'terminé')
                                    Terminé
                                @endif

                                @if ($project->status === 'annulé')
                                    Annulé
                                @endif
                            </td>
                            <td>{{ date('d/m/Y h:i', strtotime($project->created_at)) }}</td>
                            <td>{{ date('d/m/Y h:i', strtotime($project->published_at)) }}</td>
                            <td>
                               <a href="{{ route('admin.projects.edit', $project->id) }}" class="edit-icon">
                                   <i class="ion-edit"></i>
                               </a>
                               <a class="delete-icon" data-toggle="modal" data-target="#{{ $project->id}}">
                                   <i class="ion-trash-a"></i>
                               </a>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="detePartnerLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h5 class="modal-title" id="detePartnerLabel">Suppression du projet</h5>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                               </div>
                              </div>
                              <div class="modal-body">
                                <p>Voulez vous supprimer ce projet ?</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulé</button>
                                <a href="{{ route('admin.projects.delete', $project->id) }}" class="btn btn-danger btn-md active" role="button" aria-pressed="true">Supprimé</a>
                              </div>
                             </div>
                           </div>
                         </div>
                       </div>
                    @endforeach
                </tbody>
            </table>
            {{ $projects->links() }}
        </div>
    </section>
@endsection





@section('js')
<script>
$(document).ready(function () {

})
</script>
@endsection
