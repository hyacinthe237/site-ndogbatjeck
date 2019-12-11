@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Permissions</title>
@endsection

@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Permissions <i class="ion-person"></i> </div>
                </div>

                <div class="col-sm-8">
                    <div class="buttons text-right">
                        <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary btn-md pull-right">
                            <i class="ion-plus"></i> Ajouter
                        </a>

                        <form class="search-form pull-right" action="">
                            <input type="text" name="q" placeholder="Rechercher permission" autocomplete="off">
                        </form>
                    </div>
                </div>
            </div>
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
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>{{ date('d/m/Y h:i', strtotime($permission->created_at)) }}</td>
                            <td>{{ date('d/m/Y h:i', strtotime($permission->updated_at)) }}</td>
                            <td>
                                <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="edit-icon">
                                    <i class="ion-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          {{ $permissions->links() }}
        </div>
    </section>
@stop
