<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Admin page</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
      data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    @auth
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <div class="d-inline-block">Olá {{ optional(auth()->user())->name }}</div>
                <div class="d-inline-block">
                  <form method="POST" action="{{ route('logout') }}">
                  @csrf

                  <x-dropdown-link :href="route('logout')"
                                   onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Sair') }}
                  </x-dropdown-link>
                  </form>
                </div>
      </li>
    </ul>
    @endauth
    
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse sideMenu">
        <div class="sidebar-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="{{'/admin'}}">
                <span data-feather="home"></span>
                Geral <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{'/editadmin'}}">
                <span data-feather="file"></span>
                Editar
              </a>
            </li>
          </ul>
        </div>
      </nav>
    {{-- </div> --}}