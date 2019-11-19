{{-- <!-- Navigation --> --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}">
        {{ config('app.name', 'SenForage') }} 
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" 
    aria-controls="navbarResponsive" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

      <ul class="navbar-nav ml-auto">    
        
      <li class="nav-item">
        <a class="nav-link js-scroll-trigger" href="#about">A propos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link js-scroll-trigger" href="#services">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
      </li>
     {{--  <!-- Authentication Links --> --}}
        @guest
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">{{ __("Se connecter") }}</a>
        </li>
        @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ route('register') }}">{{ __("S'inscrire") }}</a>
          </li>
        @endif
        @else
                 
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->firstname }} {{ Auth::user()->name }} <span class="caret"></span> 
            </a>                   
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    {{ __('Se Déconnecter') }} 
                </a>                       
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li> 
        @endguest
      </ul>
    </div>
  </div>
</nav>