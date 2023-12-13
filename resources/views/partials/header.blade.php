    <div class="header">
        <div class="header-left active">
            <a href="index.html" class="logo">
                <img src="{{asset('assets/img/logo.png')}}" alt="">
            </a>
            <a href="index.html" class="logo-small">
                <img src="{{asset('assets/img/logo-small.png')}}" alt="">
            </a>
            <a id="toggle_btn" href="javascript:void(0);">
            </a>
        </div>

        <a id="mobile_btn" class="mobile_btn" href="#sidebar">
            <span class="bar-icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </a>
        <ul class="nav user-menu">
            <li class="nav-item">
                <div class="top-nav-search">
                    <a href="javascript:void(0);" class="responsive-search">
                        <i class="fa fa-search"></i>
                    </a>
                    <form action="#">
                        <div class="searchinputs">
                            <input type="text" placeholder="Search Here ...">
                            <div class="search-addon">
                                <span><img src="{{asset('assets/img/icons/closes.svg')}}" alt="img"></span>
                            </div>
                        </div>
                        <a class="btn" id="searchdiv"><img src="{{asset('assets/img/icons/search.svg')}}" alt="img"></a>
                    </form>
                </div>
            </li>
            <li class="nav-item dropdown has-arrow flag-nav">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
                    <img src="{{asset('assets/img/flags/us1.png')}}" alt="" height="20">
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="{{asset('assets/img/flags/us.png')}}" alt="" height="16"> Mali
                    </a>
                </div>
            </li>
        </ul>
  <div class="navbar-nav ms-auto mb-2 mb-lg-0">
    @auth
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <span class="user-img">
                    <!-- Afficher ici l'image de profil de l'utilisateur si disponible -->
                </span>
                <span class="status online"></span>
                <span>{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu">
                {{-- <a class="dropdown-item" href="{{ route('profile.edit') }}">Profil</a>
                <a class="dropdown-item" href="{{ route('profile.update') }}">Paramètres</a> --}}
                <form method="POST" action="{{ route('auth.logout') }}">
                    @method('delete')
                    @csrf
                    <button class="dropdown-item" type="submit">Déconnexion</button>
                </form>
            </div>
        </div>
    @endauth

    @guest
        <div class="nav-item">
            <a class="nav-link" href="{{ route('auth.login') }}">Se Connecter</a>
        </div>
    @endguest
</div>

    </div>
    


