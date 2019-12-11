@extends('frontend.layouts.master')


@section('head')
    <title>Le Boukarou | Offres</title>
@endsection

@section('content')
    <section class="_home-module">
        <div class="container _no-padding">

            <div class="row">
               @foreach ($offers as $offer)
                    <div class="col-sm-4 mb-10 ">
                        <a href="{{ route('offers.show', ['code' => $offer->code])}}">
                            <div class="_home-module-col">
                                @if ($offer->image)
                                    <img src="{{ $offer->image }}" class="img-responsive">
                                 @else
                                     <img src="/assets/img/eggs/07.jpg" class="img-responsive">
                                 @endif
                                <div class="title title-concat">{{ $offer->name }}</div>
                                <div class="extrait m-10"><span class="text-concat">{!! $offer->description !!}</span>

                                </div>
                                <a href="{{ route('offers.submissions.create', ['code' => $offer->code])}}" type="button" class="btn btn-primary ml-10">Souscrire</a>
                            </div>
                        </a>
                    </div>
                 @endforeach

            </div>
        </div>
    </section>
@endsection
