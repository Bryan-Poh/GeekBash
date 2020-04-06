<nav class="navbar has-shadow" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="{{ route('home') }}">
      <img src="{{ asset('images/geekbash-transparent.png') }}" alt="GeekBash Logo">
    </a>

    <a role="button" class="navbar-burger burger m-t-10" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start has-text-centered">
      <a class="navbar-item ">
        Featured
      </a>

      <a class="navbar-item ">
        Tutorials
      </a>

      <a class="navbar-item ">
        Tech
      </a>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons has-text-centered">
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
			          <a class="navbar-item" href="{{ route('profile.index', Auth::user()->name) }}">
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

@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {

  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach( el => {
      el.addEventListener('click', () => {

        // Get the target from the "data-target" attribute
        const target = el.dataset.target;
        const $target = document.getElementById(target);

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});
</script>
@endsection