@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Souscription</title>
@endsection

@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Visualisation d'une souscription <i class="ion-grid"></i> </div>
                </div>

                <div class="col-sm-8">
                    <div class="buttons text-right">
                        <a href="{{ route('admin.offers.submissions') }}" class="pull-right btn btn-grey btn-md bold">
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

    <section class="_subheader">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-10">
                    <div class="title">
                        <h5>{{ $submission->offer->name }} <i class="ion-social-buffer mr-10"></i></h5>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="buttons text-right">

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
                            <b><i class="ion-person mr-10"></i> Nom:</b> {{ $submission->firstname }} {{ $submission->lastname }}
                        </li>
                    </ul>
                </div>

                <div class="col-sm-4">
                    <ul class="list-unstyled metas">
                        <li>
                            <b><i class="ion-android-call mr-10"></i> Téléphone:</b> {{ $submission->phone }}
                        </li>
                        <li>
                            <b><i class="ion-android-mail mr-10"></i> Email:</b> {{ $submission->email }}
                        </li>
                    </ul>
                </div>

                <div class="col-sm-4">
                    <ul class="list-unstyled metas">
                        <li>
                            <b><i class="ion-flag mr-10"></i> Pays:</b> {{ $submission->country }}
                        </li>
                        <li>
                            @if ($submission->is_company == 1)
                                <b><i class="ion-ios-information mr-10"></i> Souscription d'entreprise:</b> Oui
                            @endif

                            @if ($submission->is_company == 0)
                                <b><i class="ion-ios-information mr-10"></i> Souscription d'entreprise:</b> Non
                            @endif
                        </li>
                    </ul>
                </div>

            </div>

            <hr>

            <div class="row">
                <div class="item">
                    <h5><b>Background</b></h5>
                    <div class="text">
                        <p>{!! $submission->background !!}</p>
                    </div>
                </div>


                <div class="item">
                    <h5><b>Qu’attendez-vous du Boukarou ?</b></h5>
                    <div class="text">
                        <p>{!! $submission->why_boukarou !!}</p>
                    </div>
                </div>


            </div>

        </div>
    </section>
@stop
