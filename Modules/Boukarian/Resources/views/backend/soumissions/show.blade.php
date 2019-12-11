@extends('backend.layouts.master')


@section('head')
    <title>Dashboard | Soumissions</title>
@endsection

@section('body')
    <section class="_header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title">Visualisation d'une soumission <i class="ion-grid"></i> </div>
                </div>

                <div class="col-sm-8">
                    <div class="buttons text-right">
                        <a href="{{ route('admin.soumissions') }}" class="pull-right btn btn-grey btn-md bold">
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
                        <h5>{{ $soumission->project_name }} <i class="ion-social-buffer mr-10"></i></h5>
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
                            <b><i class="ion-alert-circled mr-10"></i> Statut:</b> {{ $soumission->status }}
                        </li>
                        <li>
                            <b><i class="ion-person mr-10"></i> Porteur du projet:</b> {{ $soumission->firstname }} {{ $soumission->lastname }}
                        </li>
                    </ul>
                </div>

                <div class="col-sm-4">
                    <ul class="list-unstyled metas">
                        <li>
                            <b><i class="ion-android-call mr-10"></i> Téléphone:</b> {{ $soumission->phone }}
                        </li>
                        <li>
                            <b><i class="ion-android-mail mr-10"></i> Email:</b> {{ $soumission->email }}
                        </li>
                    </ul>
                </div>

                <div class="col-sm-4">
                    <ul class="list-unstyled metas">
                        <li>
                            <b><i class="ion-flag mr-10"></i> Pays:</b> {{ $soumission->country }}
                        </li>
                        <li>
                            @if ($soumission->is_company == 1)
                                <b><i class="ion-ios-information mr-10"></i> Project d'entreprise:</b> Oui
                            @endif

                            @if ($soumission->is_company == 0)
                                <b><i class="ion-ios-information mr-10"></i> Project d'entreprise:</b> Non
                            @endif
                        </li>
                    </ul>
                </div>

            </div>

            <hr>

            <div class="row">
                <div class="col-sm-12">
                    <div class="item">
                        <h5><b>À quel problème souhaitez-vous apporter une solution ?</b></h5>
                        <div class="text">
                            <p>{!! $soumission->issue !!}</p>
                        </div>
                    </div>

                    <div class="item">
                        <h5><b>Pourquoi ?</b></h5>
                        <div class="text">
                            <p>{!! $soumission->why_issue !!}</p>
                        </div>
                    </div>

                    <div class="item">
                        <h5><b>Quelle solution souhaitez-vous mettre en place ?</b></h5>
                        <div class="text">
                            <p>{!! $soumission->solution !!}</p>
                        </div>
                    </div>

                    <div class="item">
                        <h5><b>Racontez-nous l’histoire de votre projet</b></h5>
                        <div class="text">
                            <p>{!! $soumission->project_story !!}</p>
                        </div>
                    </div>

                    <div class="item">
                        <h5><b>Qu’avez-vous réalisé jusqu’à présent pour votre projet ?</b></h5>
                        <div class="text">
                            <p>{!! $soumission->existing_solution !!}</p>
                        </div>
                    </div>

                    <div class="item">
                        <h5><b>Quelles sont les prochaines étapes ?</b></h5>
                        <div class="text">
                            <p>{!! $soumission->next_steps !!}</p>
                        </div>
                    </div>

                    <div class="item">
                        <h5><b>Qu’attendez-vous du Boukarou ?</b></h5>
                        <div class="text">
                            <p>{!! $soumission->why_boukarou !!}</p>
                        </div>
                    </div>

                    <div class="validated" style="margin-top:50px;">
                        <form class="text-left" action="{{ URL::route('admin.soumissions.validated', [$soumission->id, 'Rejete']) }}"
                            method="post">
                            {{ csrf_field() }}
                            <button type="submit"
                                 class="pull-left btn btn-danger btn-md bold {{$soumission->status == 'Rejete' ? 'disabled' : '' }}">
                                <i class="ion-android-checkmark-circle"></i> Rejeter
                            </button>
                        </form>

                        <form class="text-right" action="{{ URL::route('admin.soumissions.validated', [$soumission->id, 'Approuve']) }}"
                            method="post">
                            {{ csrf_field() }}
                            <button type="submit"
                                class="pull-right btn btn-success btn-md bold {{$soumission->status == 'Approuve' ? 'disabled' : '' }}">
                                <i class="ion-android-checkmark-circle"></i> Valider
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
@stop
