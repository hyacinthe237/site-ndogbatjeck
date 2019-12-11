@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Soumissions</title>
@endsection

@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Soumissions <i class="ion-grid"></i> </div>
                </div>

                <div class="col-sm-8">
                    <div class="buttons text-right">


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
            <form class="_form" action="" method="get">
                <div class="row">
                    <div class="col-sm-3">
                        <label>Statut</label>
                        <select class="form-control" name="status">
                            <option value="">Tous</option>
                            <option value="En attente">En attente</option>
                            <option value="Approuve">Approuvé</option>
                            <option value="Rejete">Rejeté</option>
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <label>Dejà Vu</label>
                        <select class="form-control" name="open">
                            <option value="">Tous</option>
                            <option value="Yes">Oui</option>
                            <option value="No">Non</option>
                        </select>
                    </div>

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

            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Vu</th>
                        <th>Titre du projet</th>
                        <th>Statut</th>
                        <th>Pays</th>
                        <th>Ajoutée le</th>
                        <th>Modifiée le</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($soumissions as $submission)
                        <tr>
                            <td>{{ $submission->firstname }} {{ $submission->lastname }}</td>
                            <td>{{ $submission->open == 'Yes' ? 'Oui' : 'Non' }}</td>
                            <td>{{ $submission->project_name }}</td>
                            <td>{{ $submission->status }}</td>
                            <td>{{ $submission->country }}</td>
                            <td>{{ date('d/m/Y h:i', strtotime($submission->created_at)) }}</td>
                            <td>{{ date('d/m/Y h:i', strtotime($submission->updated_at)) }}</td>
                            <td>
                                <a href="{{ route('admin.soumissions.show', $submission->id) }}" class="edit-icon">
                                    <i class="ion-gear-b"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $soumissions->links() }}
        </div>
    </section>
@stop
