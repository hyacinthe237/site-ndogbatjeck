@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Sujets</title>
@endsection

@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Sujets <i class="ion-grid"></i> </div>
                </div>

                <div class="col-sm-8">
                    <div class="buttons text-right">
                        <a href="{{ route('admin.sujets.create') }}" class="btn btn-primary btn-md pull-right">
                            <i class="ion-plus"></i> Ajouter
                        </a>

                        <form class="search-form pull-right" action="">
                            <input type="text" name="q" placeholder="Rechercher sujet" autocomplete="off">
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
                        <th>Nom</th>
                        <th>Ajouté le</th>
                        <th>Modifié le</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($subjects as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ date('d/m/Y h:i', strtotime($category->created_at)) }}</td>
                            <td>{{ date('d/m/Y h:i', strtotime($category->updated_at)) }}</td>
                            <td>
                                <a href="{{ route('admin.sujets.edit', $category->id) }}" class="edit-icon">
                                    <i class="ion-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $subjects->links() }}

        </div>
    </section>
@stop
