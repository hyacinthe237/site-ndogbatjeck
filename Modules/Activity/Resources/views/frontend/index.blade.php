@extends('frontend.layouts.master')


@section('head')
    <title>Association ADNA</title>
@endsection

@section('content')
    <section class="_home-slider">
        @include('frontend.home.slider-event')
    </section>


    <section class="_home-module">
        <div class="container">
            <h4>Nos Evénements</h4>

            <div class="row mt-20">
                @foreach ($events as $activity)
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-12">
                            @if ($activity->isPast === 'A venir')
                                <div class="_pastille _avenir">
                                    {{ $activity->isPast }}
                                </div>
                            @endif

                            @if ($activity->isPast === 'Aujourd\'hui')
                                <div class="_pastille _aujourdhui">
                                    {{ $activity->isPast }}
                                </div>
                            @endif

                            @if ($activity->isPast === 'Passé')
                                <div class="_pastille _passe">
                                    {{ $activity->isPast }}
                                </div>
                            @endif

                        </div>
                    </div>
                    <a href="{{ route('activites.show', $activity->slug) }}">
                        <div class="_activities" style="margin-bottom:30px;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="_title-activite bold">
                                        {{ $activity->title }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <img src="{{ $activity->image }}" style="width:100px;height:100px;padding-top:10px;" class="img-responsive">
                                </div>

                                <div class="col-xs-8">
                                    <div class="content">
                                        <div class="_date">
                                            Date: {{ date('d/m/Y', strtotime($activity->date_activity)) }} <br>
                                            Heure: {{ date('h:i', strtotime($activity->time_activity)) }}
                                        </div>

                                        <div class="_lieu">
                                            Lieu: {{ $activity->location }}
                                        </div>

                                        <div class="_frequence">

                                            @if ($activity->is_frequent == 0)
                                                Fréquence: Non
                                            @endif

                                            @if ($activity->is_frequent == 1)
                                                Fréquence: Oui
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="_description" style="padding-top:2px;">
                                {!! $activity->excerpt !!}
                            </div>
                            <div class="plus">
                                <a href="{{ route('activites.show', $activity->slug) }}" class="btn btn-primary bold">Plus</a>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            {{ $events->links() }}
        </div>
    </section>
    {{-- end of events  --}}
@endsection

@section('scripts')
    @include('frontend.home.scripts')
@endsection
