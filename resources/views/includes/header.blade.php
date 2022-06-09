
  <!-- Navigation -->
  <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
      <a class="navbar-brand" href="{{'/' }}"> AVDC </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav w-100">

          <li class="nav-item active">
            <a class="nav-link" href="{{'/listacasas' }}">Apartamentos <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#contactos">Contactos <span class="sr-only">(current)</span></a>
          </li>

          @auth
            <div class="navbar-nav ml-auto action-buttons nav-right">
              <div class="nav-item dropdown ">
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
              </div>
            </div>
          @endauth
          @guest
          <div class="navbar-nav ml-auto action-buttons nav-right">
            <div class="nav-item dropdown ">
              <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle mr-4">Entrar</a>
              <div class="dropdown-menu action-form drop-menu">
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="form-group">
                    <x-input id="email" class="form-control" placeholder="Email" type="email" name="email" :value="old('email')" required autofocus />
                  </div>
                  <div class="form-group">
                    <x-input id="password" class="form-control" placeholder="Password"  type="password" name="password" required autocomplete="current-password" />
                  </div>
                  <input type="submit" class="btn btn-primary btn-block" value="Entrar">


                  <!-- Remember Me -->
                  <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                      <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                      <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                  </div>

                  <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                      <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Esqueceu-se da password?') }}
                      </a>
                    @endif
                  </div>

                </form>
              </div>
            </div>
            <div class="nav-item dropdown ">
              <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle sign-up-btn">Registar</a>
              <div class="dropdown-menu action-form drop-menu">
                <form method="POST" action="{{ route('register') }}">
                  @csrf
                  <p class="hint-text">Preencha este formulário para se registar!</p>
                  <div class="form-group">
                    <x-input id="name" class="form-control" type="text" placeholder="Nome" name="name" :value="old('name')" required autofocus />
                  </div>
                  <div class="form-group">
                    <x-input id="email" class="form-control" type="email" placeholder="Email" name="email" :value="old('email')" required />
                  </div>
                  <div class="form-group">
                    <x-input id="password" class="form-control" placeholder="Password"
                             type="password"
                             name="password"
                             required autocomplete="new-password" />
                  </div>
                  <div class="form-group">
                    <x-input id="password_confirmation" class="form-control" placeholder="Confimar password"
                             type="password"
                             name="password_confirmation" required />
                  </div>
                  <div class="form-group">
                    <label class=""><input type="checkbox" required="required"> Eu aceito <a
                        href="#">Termos &amp; Condições</a></label>
                  </div>
                  <input type="submit" class="btn btn-primary btn-block" value="Registar">
                </form>

              </div>
            </div>
          </div>
          @endguest

        </ul>
      </div>
    </nav>
  </nav>
