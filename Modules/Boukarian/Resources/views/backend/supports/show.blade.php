@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Propsoition d'aide</title>
@endsection

@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Visualisation d'une propsoition d'aide <i class="ion-grid"></i> </div>
                </div>

                <div class="col-sm-8">
                    <div class="buttons text-right">
                        <a href="{{ route('admin.supports') }}" class="pull-right btn btn-grey btn-md bold">
                            <i class="ion-reply"></i> Retour
                        </a>

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

            @if(session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">

                <div class="col-sm-4">
                    <ul class="list-unstyled metas">
                        <li>
                            <b><i class="ion-person mr-10"></i> Nom:</b> {{ $support->name }}
                        </li>
                        <li>
                            <b><i class="ion-person mr-10"></i> TYpe de personne:</b> {{ $support->person_type }} 
                        </li>
                    </ul>
                </div>

                <div class="col-sm-4">
                    <ul class="list-unstyled metas">
                        <li>
                            <b><i class="ion-android-call mr-10"></i> Téléphone:</b> {{ $support->phone }}
                        </li>
                        <li>
                            <b><i class="ion-android-mail mr-10"></i> Email:</b> {{ $support->email }}
                        </li>
                    </ul>
                </div>

                <div class="col-sm-4">
                    <ul class="list-unstyled metas">
                        <li>
                            <b><i class="ion-flag mr-10"></i> Pays:</b> {{ $support->country }}
                        </li>
                        <li>
                            @if ($support->person_type =='morale')
                                <b><i class="ion-ios-information mr-10"></i> Nom de l'organization: {{ $support->corporate_name }}</b> 
                            @endif
                        </li>
                    </ul>
                </div>

            </div>

            <hr>

            <div class="row">
                <div class="item">
                    <h5><b>Champ d'activité</b></h5>
                    <div class="text">
                        <p>{!! $support->field_of_activity !!}</p>
                    </div>
                </div>

                <div class="item">
                    <h5><b>Type de soutien</b></h5>
                    <div class="text">
                        <p>{!! $support->support_type !!}</p>
                    </div>
                </div>

                <div class="item">
                    <h5><b>Autre type de soutien</b></h5>
                    <div class="text">
                        <p>{!! $support->support_type_other !!}</p>
                    </div>
                </div>

                <div class="item">
                    <h5><b>Cible</b></h5>
                    <div class="text">
                        <p>{!! $support->sector_cible !!}</p>
                    </div>
                </div>

                <div class="item">
                    <h5><b>Experience</b></h5>
                    <div class="text">
                        <p>{!! $support->experience !!}</p>
                    </div>
                </div>

                <div class="item">
                    <h5><b>Attente</b></h5>
                    <div class="text">
                        <p>{!! $support->attente !!}</p>
                    </div>
                </div>


            </div>

        </div>
    </section>
@stop
