@section('content')
    <section class="_home-module">
        <div class="container">
            <h4>Nos partenaires</h4>

            <div class="row mt-20">
                <div class="col-sm-4">
                    @foreach ($golds as $gold)
                        <div class="row">
                            <div class="col-xs-12">
                                <img src="{{ $gold->image }}" style="width:150px;margin:auto;" alt="image gold">
                                <div class="title-gold">{{ $gold->name }}</div>
                                <div class="text-gold">
                                    {{ str_limit(strip_tags($gold->description), 30) }}
                                    @if (strlen(strip_tags($gold->description)) > 30)
                                      ... <a href="{{ route('partenaires.show', $gold->code) }}" class="btn btn-info btn-sm"><strong>Plus</strong></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-sm-4">
                    @foreach ($silvers as $silver)
                        <div class="row">
                            <div class="col-xs-12">
                                <img src="{{ $silver->image }}" style="width:150px;margin:auto;" alt="image gold">
                                <div class="title-gold">{{ $silver->name }}</div>
                                <div class="text-gold">
                                    {{ str_limit(strip_tags($silver->description), 30) }}
                                    @if (strlen(strip_tags($silver->description)) > 30)
                                      ... <a href="{{ route('partenaires.show', $silver->code) }}" class="btn btn-info btn-sm"><strong>Plus</strong></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-sm-4">
                    @foreach ($platinums as $platinum)
                        <div class="row">
                            <div class="col-xs-12">
                                <img src="{{ $platinum->image }}" style="width:150px;margin:auto;" alt="image gold">
                                <div class="title-gold">{{ $platinum->name }}</div>
                                <div class="text-gold">
                                    {{ str_limit(strip_tags($platinum->description), 30) }}
                                    @if (strlen(strip_tags($platinum->description)) > 30)
                                      ... <a href="{{ route('partenaires.show', $platinum->code) }}" class="btn btn-info btn-sm"><strong>Plus</strong></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <a class="_scroll" id="scroll" href="/accueil"></a>
@endsection

@section('scripts')
    @include('frontend.includes.scroll-scripts')
@endsection
