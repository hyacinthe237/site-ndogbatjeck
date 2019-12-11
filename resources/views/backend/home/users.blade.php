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
                        <a href="" class="btn btn-primary btn-md pull-right">
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
            <form class="_form" action="" method="post">
                <div class="row">
                    <div class="col-sm-3">
                        <label>Rôles</label>
                        <select class="form-control" name="status">
                            <option value="3">Tous</option>
                            <option value="3">Administrateur</option>
                            <option value="2">Editeur</option>
                            <option value="1">Contributeur</option>
                            <option value="0">Invité</option>
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <label>Statut</label>
                        <select class="form-control" name="status">
                            <option value="">Tous</option>
                            <option value="1">Actif</option>
                            <option value="0">Inactif</option>
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
                    <tr>
                        <td>Hyacinthe</td>
                        <td> ABANDA</td>
                        <td>Editeur</td>
                        <td>hyacinthe@izytechgroup.com</td>
                        <td>22/07/2018 18:11</td>
                        <td>
                            <a href="" class="edit-icon">
                                <i class="ion-edit"></i>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td>Ulrich</td>
                        <td> NTELLA</td>
                        <td>Editeur</td>
                        <td>ulrich@izytechgroup.com</td>
                        <td>22/07/2018 18:11</td>
                        <td>
                            <a href="" class="edit-icon">
                                <i class="ion-edit"></i>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td>Max</td>
                        <td> TONYE</td>
                        <td>Administrateur</td>
                        <td>max@izytechgroup.com</td>
                        <td>22/07/2018 18:11</td>
                        <td>
                            <a href="" class="edit-icon">
                                <i class="ion-edit"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </section>
@endsection
