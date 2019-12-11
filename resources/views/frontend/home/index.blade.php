
@extends('frontend.layouts.master')


@section('head')
    <title>Bienvenue dans Association ADNA Ndogbatjeck</title>
@endsection

@section('content')
    <section class="_home-slider">
        @include('frontend.home.slider')
    </section>

    @if (sizeof($posts))
        <section class="_home-module bg-grey">
            <div class="container">
                <h2 class="mt-40">Actualités</h2>

                <div class="row mt-40 mb-40">
                    @foreach ($posts as $post)
                    <div class="col-sm-4">
                        <a href="{{ route('posts.show', $post->slug) }}">
                            <div class="_home-module-col">
                                <img src="{{ $post->image }}" class="img-responsive">

                                <div class="title">{{ $post->title }}</div>
                                <div class="text-concat">
                                    {!! $post->excerpt !!}
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="_home-bande">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="big">une association au service de la population</div>
                </div>
            </div>
        </div>
    </section>

    @if (sizeof($projects))
        <section class="_home-module">
            <div class="container">
                <h2 class="mt-40">Nos projets</h2>

                <div class="row mt-40 mb-40">
                    @foreach ($projects as $project)
                    <div class="col-sm-6">
                        <div class="_home-module-col">
                            <img src="{{ $project->logo }}" class="img-responsive">

                            <div class="title">{{ $project->title }}</div>
                            <div class="text-concat">{!! $project->excerpt !!}</div>
                            <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-primary ml-10">En savoir plus</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @include('frontend.home.contact')

@endsection

@section('scripts')
    @include('frontend.home.scripts')
@endsection
