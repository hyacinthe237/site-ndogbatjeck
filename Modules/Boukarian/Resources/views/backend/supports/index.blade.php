@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Proposition d'aide</title>
@endsection

@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Propositions d'aides <i class="ion-grid"></i> </div>
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


   

    <section class="dashboard">
        <div class="container-fluid">

            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Pays</th>
                        <th>Type de soutien</th>
                        <th>Ajoutée le</th>
                        <th>Modifiée le</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($supports as $support)
                        <tr>
                            <td>{{ $support->name }}</td>
                            <td>{{ $support->email }}</td>
                            <td>{{ $support->phone }}</td>
                            <td>{{ $support->country }}</td>
                            <td>{{ $support->support_type }}</td>
                            <td>{{ date('d/m/Y h:i', strtotime($support->created_at)) }}</td>
                            <td>{{ date('d/m/Y h:i', strtotime($support->updated_at)) }}</td>
                            <td>
                                <a href="{{ route('admin.supports.show', $support->id) }}" class="edit-icon">
                                    <i class="ion-gear-b"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $supports->links() }}
        </div>
    </section>
@stop
