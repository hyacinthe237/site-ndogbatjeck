@extends('frontend.layouts.master')


@section('head')
    <title>Le Boukarou</title>
@endsection

@section('content')
    <section class="_home-module">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="title-about bold">
                        <h4>Qui sommes nous ?</h4>
                    </div>
                    <div class="_content-about alert alert-grey">
                        <p>Le Boukarou est une structure d’accompagnement à l’entrepreneuriat basé au Cameroun. Nous intervenons à toutes les phases du projet, de l’idée au changement d’échelle.
                        Nous nous sommes lancés le 10 décembre 2016 avec pour ambition d’être un acteur du changement social et économique au cameroun et au-delà.
                        Nous sommes présents dans les villes de Yaoundé et de Douala (siège social).
                        <br>Pour nous contacter : <a href="mailto:contact@leboukarou.digital">contact@leboukarou.digital</a> / +237 683 99 02 79.</p>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="title-about bold">
                        <h4>Notre Mission</h4>
                    </div>
                    <div class="_content-about alert alert-grey">
                        <p>Notre slogan est «  vous êtes votre propre chance ».
                        Nous pensons fondamentalement que chaque jeune camerounais, chaque jeune africain, a le génie, l’intelligence, pour porter le développement de sa communauté.
                        De ce fait, notre mission est de réveiller et d’accompagner ces talents, ces géants endormis car ils sont l’avenir pour eux-mêmes déjà, pour leur communauté, pour l’Afrique en général.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="title-about bold">
                        <h4>Notre vision</h4>
                    </div>
                    <div class="_content-about alert alert-grey">
                        <p>L’humain doit être au cœur du développement, au cœur de l’innovation, quel que soit la thématique traitée.
                            Nous portons le concept d’innovation durable : les entrepreneurs que nous accompagnons développent des solutions, produits, qui une fois sur le marché vont avoir un impact positif sur la vie des gens.
                            Nous avons donc une forte préférence pour les projets innovants, citoyens et à fort impact social.
                        </p>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="title-about bold">
                        <h4>Notre identité</h4>
                    </div>
                    <div class="_content-about alert alert-grey">
                        <p>Nous avons cassé le modèle commun du coworking space pour porter un concept nouveau : Le LifeSpace ou « espace de vie ».
                            Nous avons inscrit dans notre ADN le partage de la vie ; venez chez nous car vous avez envie de vivre profondément humaine et collaborative.
                            Une expérience humaine parce que nous valorisons tous les talents, toutes les expériences comme une richesse ; et collaborative parce que nous pensons que cette richesse doit se partager pour avoir un impact réel et durable.
                            Si nous rêvons de « créer le bonheur et de changer le monde », nous sommes pragmatiques : nos jeunes, nos startups ne pourront avoir un impact réel que par l’obtention d’un résultat concret.

                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    {{-- fin  --}}

    <!-- Team -->
<section id="team" class="_home-module pb-5">
    <div class="container">
        <h3>La Team</h3>
        <div class="row">
            @foreach ($membres as $member)
                <!-- Team member -->
                <div class="col-sm-3">
                    <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                        <div class="mainflip">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p><img class="img-fluid" src="{{ $member->image }}" alt="card image"></p>
                                        <h4 class="card-title">{{ $member->name }}</h4>
                                        <p class="card-text">{{ $member->position }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="backside">
                                <div class="card">
                                    <div class="card-body text-center mt-4">
                                        <h4 class="card-title">{{ $member->name }}</h4>
                                        <div class="card-text" style="margin-top:25px;text-align:justify;position:relative;display:inline-block;">
                                            {!! $member->description ? $member->description : 'Description en cours...' !!}</div>

                                            <div class="plus" style="margin-top:25px;">
                                              {{-- <a href="{{ route('membres.show', $member->code) }}" class="btn btn-primary">Plus</a> --}}
                                            </div>

                                        {{-- <ul class="list-inline" style="margin-top:25px;">
                                            <li class="list-inline-item">
                                                <a class="social-icon text-xs-center" target="_blank" href="#">
                                                    <i class="ion-social-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="social-icon text-xs-center" target="_blank" href="#">
                                                    <i class="ion-social-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="social-icon text-xs-center" target="_blank" href="#">
                                                    <i class="ion-social-skype"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="social-icon text-xs-center" target="_blank" href="#">
                                                    <i class="ion-social-google"></i>
                                                </a>
                                            </li>
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./Team member -->
            @endforeach
        </div>
    </div>
</section>
<!-- Team -->

    {{-- Partenaires --}}
    <section class="_home-module">
        <div class="container">
            <h4>Partenaires</h4>


            @if (sizeof($platinums))
                <h5>Platinum</h5>
                <div class="row mt-20">
                    @foreach($platinums as $item)
                        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                            <div class="partner platinum">
                                <a href="{{$item->link}}" target="_blank">
                                    <img src="{{$item->image}}" class="img-fluid" />
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if (sizeof($golds))
                <h5>Gold</h5>
                <div class="row mt-20">
                    @foreach($golds as $item)
                        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                            <div class="partner gold">
                                <a href="{{$item->link}}" target="_blank">
                                    <img src="{{$item->image}}" class="img-fluid" />
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if (sizeof($silvers))
                <h5>Silver</h5>
                <div class="row mt-20">
                    @foreach($silvers as $item)
                        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                            <div class="partner silver">
                                <a href="{{$item->link}}" target="_blank">
                                    <img src="{{$item->image}}" class="img-fluid" />
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </section>
@endsection
