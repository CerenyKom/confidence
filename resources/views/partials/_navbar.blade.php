<nav class="navbar navbar-custom navbar-fixed-top">
    <div class="container">
        <div class="navbar-header page-scroll">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="navbar">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{route('home')}}">
                {{ config('app.name') }}
            </a>
        </div>

        <div id="navbar" class="navbar-collapse collapse navbar-main-collapse">

            <!-- Right Side Of Navbar -->
            @guest
            <ul class="nav navbar-nav navbar-right">
                <li class="page-scroll">
                    <a href="#page-top">Acceuil</a>
                </li>
                <li class="page-scroll">
                    <a href="#why">A propos</a>
                </li>
                <li class="page-scroll">
                    <a href="#clients">Avis</a>
                </li>
                <li class="page-scroll">
                    <a href="#contact">Contact</a>
                </li>
                <li class="page-scroll log_account">
                    <a data-toggle="modal" data-target="#myModal"> <i class="fa fa-sign-in fa-fw"></i> <span>Connexion</span> </a>
                </li>
            </ul>
             @else
                <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" style="position: relative; padding-left: 50px;">
                                <img src="/uploads/avatar/{{ Auth::user()->image}}" style=" height: 32px; width: 32px; position: absolute; top: 10px ; left : 10px; border-radius: 50%;  ">
                                {{ Auth::user()->pseudo }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{route('profil')}}" class="fa fa-user"> Profil</a>
                                </li>
                                @if(Auth::user()->admn == 1 )
                                    <li>

                                        <a href="{{route('acceuil')}}" class="fa fa-cog"> Administration</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="fa fa-close">
                                        Deconnexion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>

                        @endguest
                 </ul>
        </div>
    </div>
</nav>