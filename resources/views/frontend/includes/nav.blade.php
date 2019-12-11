<header>
  <a class="mobile" href="#"><i class="ion-navicon-round"></i></a>
    <nav>
      <ul>

        <li><a href="/accueil">Accueil</a></li>
        <li>
            <a href="#">L'association</a>
            <ul>
                <li><a href="{{ route('qui') }}">Qui Sommes Nous ?</a></li>
                <li><a href="{{ route('secteur') }}">Echo des secteurs</a></li>
                <li><a href="#">Membres</a></li>
                <li><a href="{{ route('statuts') }}">Statuts & Règlement Intérieur</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Nos Réalisations</a>
            <ul>
                <li><a href="/projects">Projets</a></li>
                <li><a href="#">Plan d'action</a></li>
            </ul>
        </li>
        <li><a href="#">Médiathèque</a>
            <ul>
                <li><a href="{{ route('albums') }}">Galerie d'images</a></li>
                <li><a href="{{ route('video') }}">Vidéothèque</a></li>
            </ul>
        </li>
        <li><a href="#">Devenir Membre</a>
            <ul>
                <li><a href="#">Formulaire d'adhésion</a></li>
                <li><a href="#">Formulaire d'élection</a></li>
            </ul>
        </li>
        <li><a href="#">Nous Contacter</a></li>
      </ul>
      <div style="clear:both;"></div>
    </nav>
</header>
