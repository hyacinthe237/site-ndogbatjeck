@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Catégories</title>
@endsection

@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Catégories <i class="ion-grid"></i> </div>
                </div>

                <div class="col-sm-8">
                    <div class="buttons text-right">
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-md pull-right">
                            <i class="ion-plus"></i> Ajouter
                        </a>

                        <form class="search-form pull-right" action="">
                            <input type="text" name="q" placeholder="Rechercher article" autocomplete="off">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="_subheader">
        <div class="container-fluid">

        </div>
    </section>

    <section class="dashboard">
        <div class="container-fluid">

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
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ date('d/m/Y h:i', strtotime($category->created_at)) }}</td>
                            <td>{{ date('d/m/Y h:i', strtotime($category->updated_at)) }}</td>
                            <td>
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="edit-icon">
                                    <i class="ion-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </section>
@stop
