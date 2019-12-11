@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Page</title>
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
                        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary btn-md pull-right">
                            <i class="ion-plus"></i> Ajouter
                        </a>

                        <form class="search-form pull-right" action="">
                            <input type="text" name="q" placeholder="Rechercher pages" autocomplete="off" value="{{ request('q') }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="_subheader">
        <div class="container-fluid">
            <form class="_form" action="">
                <div class="row">
                    <div class="col-sm-3">
                        <label>Statut</label>
                        <select class="form-control" name="status">
                            <option value="">Tout</option>
                            <option value="published">Public</option>
                            <option value="unpublished">Privé</option>
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
                    @foreach ($pages as $page)
                        <tr>
                            <td>
                                <a href="{{ route('admin.pages.edit', $page->id) }}">
                                    {{ $page->title }}
                                </a>
                            </td>
                            <td>{{ $page->status_formatted }}</td>
                            <td>{{ $page->created_at_formatted }}</td>
                            <td>{{ $page->updated_at_formatted }}</td>
                            <td>
                                <a href="{{ route('admin.pages.edit', $page->id) }}" class="edit-icon">
                                    <i class="ion-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
           {{ $pages->links() }}
        </div>
    </section>
@endsection
