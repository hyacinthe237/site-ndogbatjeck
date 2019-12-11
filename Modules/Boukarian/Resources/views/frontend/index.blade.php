@extends('frontend.layouts.master')


@section('head')
    <title>Les Boukarians</title>
@endsection


@section('content')
    <section class="_bookarians mt-40">
        <div class="container">

            <section class="_home-module">
               <div class="row">
                   @foreach ($projects as $project)
                   <div class="col-sm-6 mt-20">
                       <div class="_company">
                           <a href="{{ route('boukarians.show', $project->code) }}">
                               <div class="row">
                                   <div class="col-xs-4">
                                       @if ($project->logo)
                                           <img src="{{ $project->logo}}" class="img img-responsive">
                                       @else
                                           <img src="/assets/img/eggs/07.jpg" class="img-responsive">
                                       @endif
                                   </div>

                                   <div class="col-xs-8">
                                       <div class="content">
                                           <div class="label-group">
                                               <div class="_label">Catégorie</div>
                                               <div class="_value">{{ $project->theme->name }}</div>
                                           </div>

                                           <div class="label-group">
                                               <div class="_label">Porteur</div>
                                               <div class="_value">{{ $project->owner}}</div>
                                           </div>
                                       </div>
                                   </div>
                               </div>

                               <div class="description" style="padding-top:10px;text-align:justify">
                                   {!! str_limit(strip_tags($project->description), 300) !!}
                                   @if (strlen(strip_tags($project->description)) > 300)
                                       <div class="plus" style="padding-top:10px;">
                                           <a href="{{ route('boukarians.show', $project->code) }}" class="btn btn-primary btn-sm bold">Plus</a>
                                       </div>
                                   @endif
                               </div>

                          </a>
                       </div>
                   </div>

                   @endforeach

               </div>
               {{ $projects->links() }}
           </section>






            <h4 class="mt-20">Vous pouvez aussi</h4>

            <div class="row mt-20">
                <div class="col-sm-6 pb-10">
                    <a href="/boukarians/devenir-boukarian" class="btn btn-xl btn-block btn-primary">
                        Devenir un Boukarian
                    </a>
                </div>

                <div class="col-sm-6">
                    <a href="boukarians/nous-soutenir" class="btn btn-xl btn-block btn-dark">
                        Soutenir les Boukarians
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
