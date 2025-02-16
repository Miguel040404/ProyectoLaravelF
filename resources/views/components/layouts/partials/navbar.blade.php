<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">

    <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Difruta el carnaval</span>
        <span class="d-none d-lg-block"><img class="img-fluid img-profile imagenRedondeada mx-auto mb-2" src="assets/img/gran-teatro-falla.jpeg" alt="..." /></span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
            {{-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Inicio</a></li> --}}
            <li class="nav-item"> <a class="nav-link js-scroll-trigger" href="{{ route('start') }}" >
                {{-- <i class="nav-icon fas fa-th"></i> --}}
                <p >
                    Inicio
                </p>
            </a></li>
            {{-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Experience</a></li> --}}
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="{{ route('group') }}" >
                    {{-- <i class="nav-icon fas fa-th"></i> --}}
                    <p >
                        Grupos
                    </p>
                </a>
            </li>
            {{-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Education</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">Skills</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#interests">Interests</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#awards">Awards</a></li> --}}
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}" id="logout-form" class="d-none">
                    @csrf
                </form>
                <a class="nav-link js-scroll-trigger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Cerrar sesión') }} ({{ auth()->user()->name }})
                </a>
            </li>
        </ul>
    </div>
</nav>