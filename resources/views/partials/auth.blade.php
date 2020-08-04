@guest
<li class="nav-item">
    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
</li>
@if (Route::has('register'))
<li class="nav-item">
    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
</li>
@endif
@else
<li class="nav-item dropdown ">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false" v-pre>
        {{-- {{ Auth::user()->name }} --}}
        <img src="{{ asset('images/icons/icon-header-01.png') }}" class="header-icon1" alt="ICON">
        <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right trans-1-8 " aria-labelledby="navbarDropdown">
        <a class="dropdown-item hov1" href="#">{{Auth::User()->name}}</a>


        <a class="dropdown-item hov1" href="{{ route('home') }}">Mes commandes</a>
        <a class="dropdown-item hov1" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>
@endguest