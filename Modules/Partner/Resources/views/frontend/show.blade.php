@extends('frontend.layouts.master')


@section('head')
    <title>Le Boukarou</title>
@endsection

@section('content')
    <section class="_home-module">
        <div class="container">

            <div class="row">
                <div class="_title-post">
                    {{ $partner->name }}
                </div>

                <div class="col-sm-4">
                    <img src="{{ $partner->image }}" class="img-responsive" alt="image post">
                </div>

                <div class="col-sm-8" style="text-align:justify;">
                    <b>Catégorie: </b> {{ $partner->category }} <br><br>
                    {!! $partner->description !!}
                </div>

            </div>



        </div>
    </section>

@endsection
