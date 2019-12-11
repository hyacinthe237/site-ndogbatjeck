@extends('frontend.layouts.landing')


@section('content')
    <section class="_landing">
      <div class="_landing-logo">
          <img src="{{ asset('/assets/img/logo-adna-150x150.png')}}" alt="Logo ADNA">
      </div>


      <div id="wrapper-slider">
          <div id="carousel">
            <img src="./assets/img/slider/image-adna-ndogbatjeck-slider-1.jpg" width="960" height="560" />
            <img src="./assets/img/slider/image-adna-ndogbatjeck-slider-2.jpg" width="960" height="560" />
            <img src="./assets/img/slider/image-adna-ndogbatjeck-slider-3.jpg" width="960" height="560" />
            <img src="./assets/img/slider/image-adna-ndogbatjeck-slider-4.jpg" width="960" height="560" />
          </div>
          <div id="overlay">
            <div id="description">
              <h3>Bienvenue dans le site Internet de {{ config('app.name') }}</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <a href="/accueil" class="btn btn-lg btn-primary btn-radius mt-20">Visiter le site internet</a>
              <div id="pager"></div>
            </div>
          </div>
      </div>
    </section>

@endsection

@section('scripts')
  <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
  <script src="/assets/js/slider/jquery.carouFredSel-6.2.0-packed.js"></script>
  <script>
    $(function() {
      $('#carousel').carouFredSel({
        direction: 'right',
        items: {
          visible: 1,
          start: -1
        },
        scroll: {
          duration: 1000,
          timeoutDuration: 3000
        },
        pagination: '#pager'
      });
    });
  </script>
@endsection
