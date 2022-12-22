<div class="container-fluid">
    <!-- Navbar brand -->
    <a class="navbar-brand" target="_blank" href="https://mdbootstrap.com/docs/standard/">
        <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="16" alt="" loading="lazy"
             style="margin-top: -3px;" />
    </a>
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
            aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarExample01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item active">
                <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('posts') }}" rel="nofollow">Posts</a>
            </li>
            <li class="nav-item">

                    <form action="{{ route('home') }}" method="get">
                        <div class="input-group">
                            <div class="form-outline">
                                <input name="s" type="search" id="form1" class="form-control" />
                                <label class="form-label" for="form1">Pesquisar</label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>

            </li>
        </ul>

        <ul class="navbar-nav d-flex flex-row">

            @if(auth()->guest())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}" >Login</a>
                </li>
            @else
                @if(auth()->user()->admin == 1)
                    <a class="btn btn-primary btn-sm" href="{{ route('postagem') }}">NOVO POST</a>
                @endif
                <div class="dropdown d-flex align-items-center">

                    <a
                        class="dropdown-toggle d-flex align-items-center hidden-arrow"
                        href="#"
                        id="navbarDropdownMenuAvatar"
                        role="button"
                        data-mdb-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <i class="fa-sharp fa-solid fa-caret-down icon-dropdown"></i>
                        <img
                            src="https://scontent.fxap2-1.fna.fbcdn.net/v/t1.6435-9/136944591_3305537212885991_237481790535507991_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeHMwonuSNTIS3zESBWorL0xW6slGWtBnDRbqyUZa0GcNKEemzzat950OmDyDgg2t1nWSf_J1YLg4a2PIqgcA_-v&_nc_ohc=aCFowu33XFoAX-poFWu&_nc_oc=AQlHBNfm57GTSMdxstwteGqTmk0y7-xARBBXaCkrDXW6k6t0VewEH7muKBtvnxk7UBo&_nc_ht=scontent.fxap2-1.fna&oh=00_AfAbA7HPo2zyArokNmdB5m7RtrwdcLEIXho9M1ltWFEIDA&oe=63C48B20"
                            class="rounded-circle"
                            height="30"
                            alt="Profile"
                            loading="lazy"
                        />
                    </a>
                    <ul
                        class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="navbarDropdownMenuAvatar"
                    >
                        <li class="name-dropdown">
                            {{ auth()->user()->fullName }}
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Perfil</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Configurações</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}">Sair</a>
                        </li>
                    </ul>
                </div>
    </div>


            @endif

        </ul>
    </div>
</div>
