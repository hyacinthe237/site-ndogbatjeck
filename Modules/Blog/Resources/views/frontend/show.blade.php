@extends('frontend.layouts.master')


@section('head')
   <title>{{ $post->title }} | Association ADNA</title>
   <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5b8944c8de278e00111a4919&product=inline-share-buttons' async='async'></script>
@endsection

@section('content')
   <section class="_home-module">
       <div class="container">

           <div class="row">
               <div class="_title-post">
                   {{ $post->title }}

                   {{-- <div class="_category-name">
                       {{ $project->category->name }}
                   </div> --}}
               </div>
           </div>
       </div>


       {{-- Image  --}}
       <img src="{{ $post->image }}" style="width:100%" alt="{{ $post->title }}">
       {{-- End of image  --}}



       <div class="container">
           <div class="_date-post mt-10">
               Publié le {{ date('d/m/Y h:i', strtotime($post->published_at)) }}
           </div>

           <div class="sharethis-inline-share-buttons"></div>

           @if ($post->tags)
               <ul class="_display-tags">
                   @for ($i=0; $i < sizeOf($post->tags_tab); $i++)
                       <li><a href="#" class="tag">{{ $post->tags_tab[$i] }}</a></li>
                   @endfor
               </ul>
           @endif

           <div class="row mt-20">
               <div class="col-sm-12">
                   <div class="content"  style="text-align:justify;padding-bottom:30px;">
                       {!! $post->content !!}
                   </div>

                   {{-- @if ($project->is_commentable === 1)
                       <div class="">
                           <comments :commentable-id="{{ $project->id }}" :commentable-type="{{ json_encode('blog') }}"></comments>
                       </div>

                       <div class="mt-10">
                           <div id="fb-root"></div>
                           <div class="fb-comments" data-href="{{route('posts.show', $project->slug)}}" data-numposts="5"></div>
                       </div>

                   @endif --}}
               </div>
           </div>
       </div>


   </section>

@endsection

@section('scripts')
    @include('frontend.includes.facebook-comments-scripts')
@endsection
