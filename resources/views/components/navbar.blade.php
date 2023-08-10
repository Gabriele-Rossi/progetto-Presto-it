<nav class="navbar navbar-expand-lg bgNav borderbreak fixed-top" id="change">
    <div class="ps-1 container-fluid">

      <button class="btnLogo">
        Menù
      <span class="arrow"><i class="fa fa-solid fa-chevron-left my-auto" style="color: #2a3851;" id="icon"></i></span>

      </button>

      <a class=" display-2  navbar-brand text-white fs-3" href="{{route('product.index')}}"><em class="text-salmon fs-1">Pr</em>es<strong class="text-salmon">to</strong>.it</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="d-flex justify-content-end">
        <span class="navbar-toggler-icon"><i class="bi bi-list burgericon"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav container-fluid spacing  mb-lg-0 d-flex justify-content-end align-items-center ">
          <li class="nav-item  ">
            <a class="btn user-custom2 pe-2 liNav active" aria-current="page" href="{{route('homePage')}}"><i class="bi bi-house fs-1 ms-1 me-0 me-md-3 me-lg-3"></i></a>
          </li>
          <li class="nav-item">
            <div class="dropstart  ">
              <button class="btn user-custom dropdown-toggle pb-0 pt-2 ps-1 me-3 " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-regular fa-flag user-custom2 fs-2 mb-2 mb-md-0 mb-lg-0"></i>
              </button>
              <ul class="dropdown-menu ">
                <li class="text-white"><x-_locale lang="it"/>ITA</li>
                <li class="text-white"><x-_locale lang="en"/>ENG</li>
                <li class="text-white"><x-_locale lang="es"/>ESP</li>
              
              </ul>
            </div>
          </li>
          
          
          {{-- <li class="nav-item">
            <a class="py-2 pe-3 text-center liNav  active" aria-current="page" href="{{route('product.index')}}">Tutti gli Annunci</a>
          </li> --}}
          @guest
          <li class="nav-item">
            <div class="btn-group dropstart ">
              <button class="btn user-custom dropdown-toggle ps-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-regular fa-user fs-2"></i>
              </button>
              <ul class="dropdown-menu m-0">
                <li class="nav-item ms-auto">
                  <a class="py-2 text-center liNav active" href="{{route('register')}}">{{__('ui.register')}}</a>
                </li>
                <li class="nav-item">
                  <a class="py-2 text-center liNav active" href="{{route('login')}}">{{__('ui.login')}}</a>
                </li>
                
              </ul>
            </div>
          </li>
          {{-- <li class="nav-item">
            <a class="py-2 pe-3 text-center liNav" href="{{route('product.prova')}}">ProvaNavbar</a>
          </li> --}}
          @endguest
          @auth
          @if(Auth::user()->is_revisor)
          <li class="nav-item dropdown m-0">
            <a class="dropdown-toggle text-white liNav me-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{__('ui.revisor')}}
            </a>
            <div class="text-white liNav mb-2">{{Auth::user()->name}}</div>
            <ul class="dropdown-menu bgDropNavbar liNav">
              <li><a class="dropdown-item text-white" href="{{route('product.create')}}">{{__('ui.allAnnouncements')}}</a></li>
              <li><a class="dropdown-item text-white" href="{{route('product.user')}}">{{__('ui.myAnnouncements')}}</a></li>
              <li><hr class="dropdown-divider text-salmon"></li>
              <li><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a></li>
                <form action="{{route('logout')}}" method="POST" class="d-none" id="logout-form">
                    @csrf
                </form>
            </ul>
          </li>
          @else
          <li class="nav-item dropdown m-0">
            <a class="py-2 pe-3 text-center liNav active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{__('ui.welcomeUser')}} {{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu bgNav">
              <li><a class="dropdown-item text-white" href="{{route('product.create')}}">{{__('ui.allAnnouncements')}}</a></li>
              <li><a class="dropdown-item text-white" href="{{route('product.user')}}">{{__('ui.myAnnouncements')}}</a></li>
              {{-- <li><a class="dropdown-item text-white" href="#">Another action</a></li> --}}
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-white" href="{{route('logout')}}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a></li>
                <form action="{{route('logout')}}" method="POST" class="d-none" id="logout-form">
                    @csrf
                </form>
            </ul>
          </li>
          @endif
          @endauth
        </ul>
      </div>
    </div>
  </nav>




  