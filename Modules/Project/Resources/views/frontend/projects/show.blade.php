@extends('frontend.layouts.master')


@section('head')
   <title>{{ $project->title }} | Association ADNA</title>
   <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5b8944c8de278e00111a4919&product=inline-share-buttons' async='async'></script>
@endsection

@section('content')
   <section class="_home-module">
       <div class="container">

           <div class="row">
               <div class="_title-post">
                   {{ $project->title }}

                   {{-- <div class="_category-name">
                       {{ $project->category->name }}
                   </div> --}}
               </div>
           </div>
       </div>


       {{-- Image  --}}
       <img src="{{ $project->logo }}" style="width:100%" alt="{{ $project->title }}">
       {{-- End of image  --}}



       <div class="container">
           <div class="_date-post mt-10">
               Publié le {{ date('d/m/Y h:i', strtotime($project->published_at)) }}
           </div>

           <div class="sharethis-inline-share-buttons"></div>

           @if ($project->tags)
               <ul class="_display-tags">
                   @for ($i=0; $i < sizeOf($project->tags_tab); $i++)
                       <li><a href="#" class="tag">{{ $project->tags_tab[$i] }}</a></li>
                   @endfor
               </ul>
           @endif

           <div class="row mt-20">
               <div class="col-sm-8">
                   <div class="content"  style="text-align:justify;padding-bottom:30px;">
                       {!! $project->content !!}
                   </div>

                   @if ($project->is_commentable === 1)
                       <div class="">
                           <comments :commentable-id="{{ $project->id }}" :commentable-type="{{ json_encode('projects') }}"></comments>
                       </div>

                       <div class="mt-10">
                           <div id="fb-root"></div>
                           <div class="fb-comments" data-href="{{route('projects.show', $project->slug)}}" data-numposts="5"></div>
                       </div>

                   @endif
               </div>


               <div class="col-sm-4">
                   <div class="more-posts">
                       @foreach ($projects as $p)
                           <a href="">
                               <div class="post pb-20">
                                   <img src="{{ $p->logo }}" class="img-responsive">
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
