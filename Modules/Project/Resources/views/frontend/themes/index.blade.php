@extends('frontend.layouts.master')


@section('head')
    <title>Le Boukarou</title>
@endsection

@section('content')
    <section class="_home-module">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="head-title">
                        <h3>Sur différentes thématiques, comment les parties prenantes
                        peuvent elles réfléchir <br> et agir ensemble pour améliorer et/ou changer la vie des bénéficiaires ?</h3>
                    </div>
                </div>
            </div>
            <div class="row mt-20">
                @foreach ($themes as $theme)
                    <div class="col-sm-4">
                        <a href="{{ route('life-units.show', $theme->slug) }}">
                            <img src="{{$theme->image}}" class="img-responsive" style="display:block;margin:auto;margin-bottom:20px;">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- fin  --}}

    <a class="_scroll" id="scroll" href="/accueil"></a>
@endsection

@section('scripts')
    @include('frontend.includes.scroll-scripts')
@endsection
