@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Article</title>
@endsection

@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Article <i class="ion-compose"></i> </div>
                </div>

                <div class="col-sm-8">
                    <div class="buttons text-right">
                        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary btn-md pull-right">
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
            <form class="_form" action="" method="get">
                <div class="row">
                    <div class="col-sm-3">
                        <label>Statut</label>
                        <select class="form-control" name="status">
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
                        <th>Ajouté le</th>
                        <th>Publié le</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->status == 'published' ? 'Public' : 'Privé' }}</td>
                            <td>{{ date('d/m/Y h:i', strtotime($post->created_at)) }}</td>
                            <td>{{ date('d/m/Y h:i', strtotime($post->published_at)) }}</td>
                            <td>
                                <a href="{{ route('admin.blog.edit', $post->id) }}" class="edit-icon">
                                    <i class="ion-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $posts->links() }}

        </div>
    </section>
@stop
