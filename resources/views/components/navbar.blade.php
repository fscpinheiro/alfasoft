<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="{{ url('/') }}">
          <img src="{{ asset('img/logo_alfa.png') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
          Alfasoftware
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="{{ route('contacts.index') }}"><i class="fas fa-address-book"></i> Contatos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="{{ route('roadmap') }}"><i class="fas fa-route"></i> Roadmap</a>
            </li>
        </ul>
        <div class="me-5">
          @if (Auth::check())
              <div class="dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user"></i> Olá, {{ Auth::user()->name }}
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#"><i class="fas fa-user"></i> Perfil</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                       <i class="fas fa-sign-out-alt"></i> Logout
                      </a></li>
                  </ul>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          @else
              <a class="nav-link text-white" href="{{ route('login') }}"> <i class="fas fa-sign-in-alt"></i> Login</a>
          @endif
        </div>
      </div>
    </div>
  </nav>