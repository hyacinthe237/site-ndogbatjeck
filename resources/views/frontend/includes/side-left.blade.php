<div id="sidebar-wrapper ml-40">
    <ul class="sidebar-nav ml-40">
        <li class="{{ Request::is('bienvenue') ? 'active' : '' }}">
            <a href="{{ route('bienvenue') }}">
                <i class="ion-clipboard"></i> Mot de président
            </a>
        </li>
        <li class="{{ Request::is('presentation') ? 'active' : '' }}">
            <a href="{{ route('presentation') }}">
                <i class="ion-clipboard"></i> Présentation
            </a>
        </li>
        <li class="{{ Request::is('bureau') ? 'active' : '' }}">
            <a href="{{ route('bureau') }}">
                <i class="ion-clipboard"></i> Bureau exécutif
            </a>
        </li>
        <li class="{{ Request::is('organisation') ? 'active' : '' }}">
            <a href="{{ route('organisation') }}">
                <i class="ion-clipboard"></i> Organisation
            </a>
        </li>
        <li class="{{ Request::is('statuts-reglement') ? 'active' : '' }}">
            <a href="{{ route('statuts') }}">
                <i class="ion-clipboard"></i> Statuts & Reglement
            </a>
        </li>
        <li class="{{ Request::is('devenir-membre') ? 'active' : '' }}">
            <a href="{{ route('devenir-membre') }}">
                <i class="ion-clipboard"></i> Devenir membre
            </a>
        </li>
        <li class="{{ Request::is('albums') ? 'active' : '' }}">
            <a href="{{ route('albums') }}">
                <i class="ion-clipboard"></i> Albums photo
            </a>
        </li>
        <li class="{{ Request::is('documentation') ? 'active' : '' }}">
            <a href="{{ route('documentation')}}">
                <i class="ion-clipboard"></i> Documentation
            </a>
        </li>
    </ul>
</div>


<div class="list-group mt-20">
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <img src="./assets/img/image-parties-du-corps-en-bassa.jpg" class="img-responsive" alt="">
  </a>
</div>
<div class="list-group mt-20">
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <img src="./assets/img/image-hymne-ndog-badjeck-partie-1.jpg" class="img-responsive" alt="">
    <img src="./assets/img/image-hymne-ndog-badjeck-partie-2.jpg" class="img-responsive" alt="">
  </a>
</div>
