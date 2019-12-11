@extends('frontend.layouts.master')


@section('head')
    <title> Project</title>

@endsection


@section('content')
    <section class="_home-module">
        <div class="container">

            <div class="row">
                <div>
                    <div class="title col-sm-12"><h4><strong>{{ $project->title}}</strong></h4></div>
                    <div class="col-sm-12 mt-40">
                    	<div class="content">
	                        <div class="label-group">
	                            <div class="_label h4"><strong>Catégorie :</strong> {{ $project->theme->name }}</div>
	                        </div>

	                        <div class="label-group">
	                            <div class="_label h4"><strong>Porteur :</strong> {{ $project->owner}}</div>
	                        </div>
	                    </div>

                    </div>
                    <div class="content">
                    	<div class="col-sm-4 mt-40">
	                        @if ($project->logo)
	                            <img src="{{ $project->logo}}" class="img-responsive">
	                        @else
	                            <img src="/assets/img/eggs/07.jpg" class="img-responsive">
	                        @endif
                    	</div>
	                    <div class="col-sm-8 mt-40">
	                        <div class="extrait">{!! $project->description !!}</div>
	                    </div>
                    </div>

                 </div>
            </div>
        </div>
    </section>

@endsection
