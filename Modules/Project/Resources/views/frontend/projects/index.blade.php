@extends('frontend.layouts.master')


@section('head')
    <title>Association ADNA | Projets</title>
@endsection

@section('content')
    <section class="_home-module">
        <div class="container">

            <div class="row">
                @foreach ($projects as $project)
                    <div class="col-sm-4">
                        <a href="{{ route('projects.show', $project->slug) }}">
                            <div class="_home-module-col posts">
                                <img src="{{ $project->image }}" class="img-responsive">
                                <div class="title">{{ $project->title }}</div>
                                <div class="extrait">{!! $project->excerpt !!}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            {{-- {{ $projects->links() }} --}}
        </div>
    </section>
@endsection
