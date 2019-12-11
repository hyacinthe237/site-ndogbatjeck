@extends('frontend.layouts.master')


@section('head')
   <title>Statuts & règlement | Association Ndogbadjeck</title>
   <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5b8944c8de278e00111a4919&product=inline-share-buttons' async='async'></script>
@endsection

@section('content')
   <section class="_home-module">
      @include('frontend.includes.breadcrumb', [ 'current' => 'Statuts & règlement'])
      <div class="sharethis-inline-share-buttons"></div>
      <div class="row mt-20">
          <div class="col-sm-12">
              <embed src="./assets/pdf/Congres-2017-Statuts-Adna-Ndogbatjeck.pdf" width="100%" height="500px" type='application/pdf'/>
          </div>
          <div class="col-sm-6 mt-10">
              <embed src="./assets/pdf/Congres-2017-Rglt-Interieur-Ndogbatjeck.pdf" width="100%" height="500px" type='application/pdf'/>
          </div>
          <div class="col-sm-6 mt-10">
              <embed src="./assets/pdf/Congres-2017-Cion-Politique-Gle-et-dvpt.pdf" width="100%" height="500px" type='application/pdf'/>
          </div>
      </div>
       @if (sizeOf($pages))
          @foreach ($pages as $p)
             <div class="col-sm-4 mt-20">
               <div class="more-posts">
                       <a href="">
                           <div class="post pb-20">
                               <img src="{{ $p->image }}" class="img-responsive">
                               <div class="p-title">{{ $p->title }}</div>
                           </div>
                       </a>
               </div>
             </div>
           @endforeach
       @endif

   </section>
   @endsection
