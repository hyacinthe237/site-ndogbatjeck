<div id="sidebar-wrapper">
    <ul class="sidebar-nav">

        <li class="{{ Request::is('admin') ? 'active' : '' }} brand">
            <a href="{{ route('admin.dashboard') }}">
                {{ config('app.name') }}
            </a>
        </li>


        <li class="{{ Request::is('admin/pages*') ? 'active' : '' }}">
            <a href="/admin/pages">
                <i class="ion-clipboard"></i>
                Pages
            </a>
        </li>


        <li class="dropdown {{ Request::is('admin/blog*') ? 'active open' : '' }}">
            <a href="" data-toggle="dropdown">
                <i class="ion-compose"></i>
                Blog
                <span class="ml-10 ion-chevron-down"></span>
                <span class="ml-10 ion-chevron-up"></span>
            </a>

            <ul class="sidebar-dropdown">
                <li>
                    <a href="/admin/blog">
                        Articles
                    </a>
                </li>
                <li>
                    <a href="/admin/blog/categories">
                        Catégories
                    </a>
                </li>
            </ul>
        </li>

        <li class="dropdown {{ Request::is('admin/projects*') ? 'active open' : '' }}">
            <a href="" data-toggle="dropdown">
                <i class="ion-social-buffer"></i>
                Les Boukarians
                <span class="ml-10 ion-chevron-down"></span>
                <span class="ml-10 ion-chevron-up"></span>
            </a>

            <ul class="sidebar-dropdown">
                <li>
                    <a href="/admin/projects/themes">
                        Thèmes
                    </a>
                </li>
                <li>
                    <a href="/admin/projects/soumissions">
                        Soumissions
                    </a>
                </li>
                <li>
                    <a href="/admin/projects">
                        projets
                    </a>
                </li>
                <li>
                    <a href="/admin/projects/supports">
                        soutiens
                    </a>
                </li>
            </ul>
        </li>

        <li class="dropdown {{ Request::is('admin/activites*') ? 'active open' : '' }}">
            <a href="" data-toggle="dropdown">
                <i class="ion-android-walk"></i>
                Activités
                <span class="ml-10 ion-chevron-down"></span>
                <span class="ml-10 ion-chevron-up"></span>
            </a>

            <ul class="sidebar-dropdown">
                <li>
                    <a href="/admin/activites/sujets">
                        Sujets
                    </a>
                </li>
                <li>
                    <a href="/admin/activites">
                        Activités
                    </a>
                </li>
            </ul>
        </li>


        <li class="dropdown {{ Request::is('admin/users*') ? 'active' : '' }}">
            <a href="" data-toggle="dropdown">
                <i class="ion-android-people"></i>
                Utilisateurs
                <span class="ml-10 ion-chevron-down"></span>
                <span class="ml-10 ion-chevron-up"></span>
            </a>

            <ul class="sidebar-dropdown">
                <li>
                    <a href="/admin/users/roles">
                        Rôles
                    </a>
                </li>
                <li>
                    <a href="/admin/users/permissions">
                        Permissions
                    </a>
                </li>
                <li>
                    <a href="/admin/users">
                        Utilisateurs
                    </a>
                </li>
            </ul>
        </li>

        <li class="dropdown {{ Request::is('admin/members*') ? 'active' : '' }}">
            <a href="" data-toggle="dropdown">
                <i class="ion-ios-people"></i>
                Team
                <span class="ml-10 ion-chevron-down"></span>
                <span class="ml-10 ion-chevron-up"></span>
            </a>

            <ul class="sidebar-dropdown">

                <li>
                    <a href="/admin/members">
                        Membres
                    </a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is('admin/partners*') ? 'active' : '' }}">
            <a href="/admin/partners">
                <i class="ion-network"></i>
                Partenaires
            </a>
        </li>

        <li class="dropdown {{ Request::is('admin/offers*') ? 'active open' : '' }}">
            <a href="" data-toggle="dropdown">
                <i class="ion-social-buffer"></i>
                Offres
                <span class="ml-10 ion-chevron-down"></span>
                <span class="ml-10 ion-chevron-up"></span>
            </a>

            <ul class="sidebar-dropdown">
                <li>
                    <a href="/admin/offers">
                        Offres
                    </a>
                </li>
                <li>
                    <a href="/admin/offers/souscriptions">
                        Souscriptions
                    </a>
                </li>
            </ul>
        </li>


        <li class="{{ Request::is('admin/files*') ? 'active' : '' }}">
            <a href="/admin/files">
                <i class="ion-folder"></i>
                Fichiers
            </a>
        </li>
    </ul>


    {{-- bottom menu  --}}
    <ul class="sidebar-nav bottom">
        <li>
            <a href="/" target="_blank">
                <i class="ion-ios-world-outline"></i>
                Site Public
            </a>
        </li>

        <li>
            <a href="{{ route('admin.logout') }}">
                <i class="ion-power"></i>
                Déconnexion
            </a>
        </li>
    </ul>
</div>
