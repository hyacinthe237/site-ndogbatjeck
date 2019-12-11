@extends('frontend.layouts.master')


@section('head')
   <title>{{ $page->title }} | Association Ndogbadjeck</title>
   <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5b8944c8de278e00111a4919&product=inline-share-buttons' async='async'></script>
@endsection

@section('content')
   <section class="_home-module">
      @include('frontend.includes.breadcrumb', [ 'current' => 'Bureau exécutif'])
       @if ($page)
         <div class="container">

             <div class="row">
                 <div class="_title-post">
                     {{ $page->title }}
                 </div>
             </div>
         </div>

         {{-- Image  --}}
         @if ($page->image)
            <div class="_image-post">
                <img src="{{ $page->image }}" style="width:100%" class="img-responsive" alt="{{ $page->title }}">
            </div>
         @endif
         {{-- End of image  --}}

         <div class="container">
             <div class="_date-post mt-10">
                 Publié le {{ date('d/m/Y h:i', strtotime($page->published_at)) }}
             </div>

             <div class="sharethis-inline-share-buttons"></div>

             @if ($page->tags)
                 <ul class="_display-tags">
                     @for ($i=0; $i < sizeOf($page->tags_tab); $i++)
                         <li><a href="#" class="tag">{{ $page->tags_tab[$i] }}</a></li>
                     @endfor
                 </ul>
             @endif

             <div class="row mt-20">
                 <div class="col-sm-8">
                    <embed src="./assets/pdf/bureau-executif.pdf" width="100%" height="300px" type='application/pdf'/>
                     <div class="content"  style="text-align:justify;padding-bottom:30px;">
                         {!! $page->content !!}
                     </div>

                     {{-- @if ($page->is_commentable === 1)
                         <div class="">
                             <comments :commentable-id="{{ $page->id }}" :commentable-type="{{ json_encode('pages') }}"></comments>
                         </div>

                         <div class="mt-10">
                             <div id="fb-root"></div>
                             <div class="fb-comments" data-href="{{ route('pages.show', $page->slug)}}" data-numposts="5"></div>
                         </div>

                     @endif --}}

                 </div>


                 <div class="col-sm-4">

                     <div class="more-posts">
                         @foreach ($pages as $p)
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
       @else
         <div class="row">
            <h3>Cette page est en production...</h3>
         </div>
       @endif

   </section>
   @endsection
