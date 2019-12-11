@extends('frontend.layouts.master')


@section('head')
    <title>Le Boukarou</title>
@endsection

@section('content')
    <section class="_home-module">
        <div class="container">

            <div class="row">
                <div class="_title-post" style="padding-left:10px;">
                    {{ $theme->name }}

                    <div class="_date-post" style="padding-left:5px;">
                        Publié le {{ date('d/m/Y h:i', strtotime($theme->created_at)) }}
                    </div>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-sm-4">
                    <img src="{{$theme->image}}" alt="{{ $theme->slug }}" class="img-responsive" style="display:block;margin:auto;">
                </div>
                <div class="col-sm-8">
                    <div class="_content-post">
                        {!! ($theme->description == null ) ? 'Désolé, nous rédigeons encore une description pour ce Life Unit...' : $theme->description !!}
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
