@extends('frontend.layouts.master')


@section('head')
    <title>Association ADNA | Blog</title>
@endsection

@section('content')
    <section class="_home-module">
        <div class="container">

            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-sm-4">
                        <a href="{{ route('article.show', $post->slug) }}">
                            <div class="_home-module-col posts">
                                <img src="{{ $post->image }}" class="img-responsive">
                                <div class="title">{{ $post->title }}</div>
                                <div class="extrait">{!! $post->excerpt !!}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            {{ $posts->links() }}
        </div>
    </section>
@endsection
