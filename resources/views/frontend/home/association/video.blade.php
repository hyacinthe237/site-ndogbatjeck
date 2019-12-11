@extends('frontend.layouts.master')


@section('head')
    <title>Vidéothèque</title>
@endsection

@section('content')
  <section>
      @include('frontend.includes.breadcrumb', [ 'current' => 'Vidéothèque'])
      <div class="mt-20">
            <div class="embed-responsive embed-responsive-16by9">
                  <iframe
                      class="embed-responsive-item"
                      src="https://www.youtube.com/embed/videoseries?list=PLx0sYbCqOb8TBPRdmBHs5Iftvv9TPboYG?showinfo=0&controls=0" frameborder="0"  allowfullscreen
                  >
                  </iframe>
            </div>
            <div class="embed-responsive embed-responsive-16by9 mt-20">
                  <iframe
                      class="embed-responsive-item"
                      src="https://www.youtube.com/embed/videoseries?list=PLx0sYbCqOb8TBPRdmBHs5Iftvv9TPboYG?showinfo=0&controls=0" frameborder="0"  allowfullscreen
                  >
                  </iframe>
            </div>
      </div>
  </section>
@endsection
