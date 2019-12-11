@extends('frontend.layouts.master')


@section('head')
    <title>Le Boukarou | Offres</title>
@endsection

@section('content')
    <section class="_home-module">
        <div class="container">

            <div class="row">
                <div>
                    <div class="title col-sm-12"><h4><strong>{{ $offer->name}}</strong></h4></div>
                    <div class="col-sm-4 mt-40">
                        @if ($offer->image)
                            <img src="{{ $offer->image}}" class="img-responsive">
                        @else
                            <img src="/assets/img/eggs/07.jpg" class="img-responsive">
                        @endif
                        <a href="{{ route('offers.submissions.create', ['code' => $offer->code])}}" type="button" class="btn btn-primary mt-40">Souscrire</a>
                    </div>
                    <div class="col-sm-8 mt-40">
                        <div class="extrait">{!! $offer->description !!}</div>
                    </div>
                 </div>
            </div>
        </div>
    </section>
@endsection
