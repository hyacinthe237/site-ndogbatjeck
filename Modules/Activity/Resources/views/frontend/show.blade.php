@extends('frontend.layouts.master')


@section('head')
    <title>Association ADNA</title>
    <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5b8944c8de278e00111a4919&product=inline-share-buttons' async='async'></script>
@endsection

@section('content')
    <section class="_home-module">
        <div class="container">

            <div class="row">
                <div class="_title-post">
                    {{ $activity->title }}
                </div>
            </div>
        </div>

        <img src="{{ $activity->image }}" style="width:100%" alt="{{ $activity->title }}">

        <div class="container">
            <div class="_date-post mt-10">
                Publié le {{ date('d/m/Y h:i', strtotime($activity->published_at)) }}
            </div>

            <div class="sharethis-inline-share-buttons"></div>

            <div class="row mt-20">
                <div class="col-sm-8">
                    <div class="content" style="text-align:justify;padding-bottom:30px;">
                        {!! $activity->description !!}
                    </div>

                    @if ($activity->is_commentable === 1)
                        <div class="">
                            <comments :commentable-id="{{ $activity->id }}" :commentable-type="{{ json_encode('activites') }}"></comments>
                        </div>

                        <div class="mt-10">
                            <div id="fb-root"></div>
                            <div class="fb-comments" data-href="{{route('article.show', $activity->slug)}}" data-numposts="5"></div>
                        </div>

                    @endif
                </div>


                <div class="col-sm-4">
                    <div class="more-posts">
                        @foreach ($activites as $p)
                            <a href="">
                                <div class="post pb-20">
                                    <img src="{{ $p->image }}" class="img-responsive">
                                    <div class="p-title">{{ $p->title }}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @include('frontend.includes.facebook-comments-scripts')
@endsection
