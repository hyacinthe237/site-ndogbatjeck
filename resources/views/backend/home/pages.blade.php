@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Pages</title>
@endsection



@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Pages <i class="ion-clipboard"></i> </div>
                </div>

                <div class="col-sm-8">
                    <div class="buttons text-right">
                        <a href="" class="btn btn-primary btn-md pull-right">
                            <i class="ion-plus"></i> Ajouter
                        </a>

                        <form class="search-form pull-right" action="">
                            <input type="text" name="q" placeholder="Search pages" autocomplete="off">
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

            <table class="table">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Statut</th>
                        <th>Ajoutée le</th>
                        <th>Modifié</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Les Bookarians</td>
                        <td>Privé</td>
                        <td>22/07/2018 17:23</td>
                        <td>22/07/2018 18:11</td>
                        <td>
                            <a href="" class="edit-icon">
                                <i class="ion-edit"></i>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td>Qui sommes nous ?</td>
                        <td>Public</td>
                        <td>22/07/2018 17:23</td>
                        <td>22/07/2018 18:11</td>
                        <td>
                            <a href="" class="edit-icon">
                                <i class="ion-edit"></i>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td>Machins trucs</td>
                        <td>Public</td>
                        <td>22/07/2018 17:23</td>
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
