@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Utilisateurs</title>
@endsection



@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Utilisateurs <i class="ion-android-people"></i> </div>
                </div>

                <div class="col-sm-8">
                    <div class="buttons text-right">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-md pull-right">
                            <i class="ion-plus"></i> Ajouter
                        </a>

                        <form class="search-form pull-right" action="">
                            <input type="text" name="q" placeholder="Recherche utilisateurs" autocomplete="off">
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
                        <label>Rôles</label>
                        <select class="form-control" name="role">
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <label>Statut</label>
                        <select class="form-control" name="status">
                            <option value="">Tous</option>
                            <option value="active">Actif</option>
                            <option value="pending">En attente</option>
                            <option value="blocked">Bloqué</option>
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
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Rôle</th>
                        <th>Email</th>
                        <th>Créé</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->firstname }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ date('d/m/Y h:i', strtotime($user->created_at)) }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="edit-icon">
                                    <i class="ion-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
          {{ $users->links() }}
        </div>
    </section>
@endsection
