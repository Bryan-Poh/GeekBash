<nav class="navbar has-shadow p-l-100 p-r-100" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="{{ route('home') }}">
      <img src="{{ asset('images/geekbash.png') }}" alt="GeekBash Logo">
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item ">
        Learn
      </a>

      <a class="navbar-item ">
        Discuss
      </a>

      <a class="navbar-item ">
        Share
      </a>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          @if(Auth::guest())
						<a href="{{ route('login') }}" class="button is-primary">Login</a>
						<a href="{{ route('register') }}" class="button is-light">Register for an account</a>
					@else
            <div class="current-date m-r-20">
              {{ now()->format('l, d F Y') }}
              <span class="icon">
                <i class="far fa-calendar-alt"></i>
              </span>
            </div>

						<div class="navbar-item has-dropdown is-hoverable">
			        <a class="navbar-link">
			          Hey {{Auth::user()->name}}
			        </a>

			        <div class="navbar-dropdown">
			          <a class="navbar-item">
			            Profile
			          </a>
			          <a class="navbar-item">
			            Notifications
			          </a>
			          <a class="navbar-item">
			            Settings
			          </a>
                <a class="navbar-item" href="{{ route('manage.dashboard') }}">
                  Manage
                </a>
			          <hr class="navbar-divider">
                <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
			        </div>
			      </div>
					@endif
        </div>
      </div>
    </div>
  </div>
</nav>
