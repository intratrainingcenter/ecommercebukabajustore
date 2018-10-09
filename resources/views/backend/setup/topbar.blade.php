  <div class="topbar">
    <nav class="navbar-custom">
        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                @if (Auth::user()->avatar)
                <img src="{{ asset('storage/imageuser/'.Auth::user()->avatar) }}" defaultimguser alt="user" class="rounded-circle">
                @else
                <img src="{{ asset('defaultimguser.png') }}" alt="user" class="rounded-circle">
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <a class="dropdown-item" href="" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
    <ul class="list-inline menu-left mb-0">
        <li class="list-inline-item">
            <button type="button" class="button-menu-mobile open-left waves-effect">
                <i class="ion-navicon"></i>
            </button>
        </li>
        <li class="hide-phone list-inline-item app-search">
            <h3 class="page-title">Setup Application</h3>
        </li>
    </ul>
    <div class="clearfix"></div>
</nav>
</div>
